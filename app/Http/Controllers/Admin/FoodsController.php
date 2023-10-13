<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foods;
use App\Models\Foods_options;
use App\Models\Foods_options_options;
use App\Models\Foods_type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function redirect;
use function view;

class FoodsController extends Controller
{

    public function index(Request $request){
        $foods = Foods::all();
        $food_types = Foods_type::all();
        return view("Admin.pages.Foods.index", compact('foods', 'food_types'));
    }

    public function create(Request $request){
        $food_types = Foods_type::all();
        return view('Admin.pages.Foods.create', compact('food_types'));
    }

    public function store(Request $request){
        $types = Foods_type::all();
        $validate = [
            "title" => "required|string|max:255",
            "price" => "required",
            "ingredient" => "string|nullable",
            "pic_url" => "string",
            "need_age_check" => [Rule::in([0,1, true, false])],
            "order" => "integer",
            "draft" => "bool",
            "food_types*" => ['required', 'array:ids', Rule::in($types)],
            "option_title*" => 'string|nullable',
            "option_value*" => 'string|nullable',
            "option_price*" => 'string|nullable',
        ];






        $options_options = [];
        foreach($request->option_title as $index=>$option){
            if($option !== null ) {
                foreach($request->option_value[$index] as $index_options => $value){
                    $options_options[$option][] = new Foods_options_options([
                        'option_value' => $value,
                        'price' => $request->option_price[$index][$index_options],
                    ]);
                }
            }
        }
        $request->validate($validate);
        $food = new Foods();
        $food->title = $request->title;
        $food->slug = $request->title;
        $food->price = $request->price;
        $food->ingredient = $request->ingredient;
        $food->ratio = 0;
        $food->pic_url = $request->pic_url;
        $food->need_age_check = $request->need_age_check ? true : false;
        $food->draft = $request->draft ? false : true;

        $type_ids = $request->food_types;

        $food->save();

        if( $food instanceof Foods){

            $food->food_types()->attach($type_ids);
            foreach($options_options as $index=>$option){
                $food_options = new Foods_options();
                $food_options->food_id = $food->id;
                $food_options->option_title = $index;
                $food_options->save();
                $food_options->options()->saveMany($option);
            }
            return redirect('/admin/foods/')->with('notify', ['msg'=>"Food Successfully added", "status" => "success"]);
        }
        return view("Admin.pages.Foods.create")->with('notify', ["msg" => "Something went wrong, please try again", "status" => "danger"]);
    }

    public function show(\App\Models\Foods $food){

        $food_types = Foods_type::all();
        $food_types_ids = $food->getFoodTypesIds();
//        dd($food_types_ids);

        return view('Admin.pages.Foods.edit', compact('food', 'food_types', 'food_types_ids'));

    }

    public function update(Foods $food, Request $request){

        $food_types = Foods_type::all();
        $validate = [
            "title" => "required|string|max:255",
            "price" => "required",
            "ingredient" => "string|nullable",
            "need_age_check" => [Rule::in(["on", null])],
            "pic_url" => "nullable",
            "draft" => "boolean",
            "food_types*" => ['required', 'array:ids', Rule::in($food_types)],
            "option_title*" => 'string|nullable',
            "option_value*" => 'string|nullable',
            "option_price*" => 'string|nullable',
        ];

        $request->validate($validate);

        $options_options = [];
        foreach($request->option_title as $index=>$option){
            if($option !== null ) {
                foreach($request->option_value[$index] as $index_options => $value){
                    $options_options[$option][] = new Foods_options_options([
                        'option_value' => $value,
                        'price' => $request->option_price[$index][$index_options],
                    ]);
                }
            }
        }

        $data = [
            'title' => $request->title,
            'price' => $request->price,
            'ingredient' => $request->ingredient,
            'pic_url' => $request->pic_url,
            'need_age_check' => $request->need_age_check == "on" ? true: false,
            'draft' => $request->draft ? false : true,
        ];

        try{

            $food->update($data);
            $food->food_options()->delete();
            foreach($options_options as $index=>$option){
                $food_options = new Foods_options();
                $food_options->food_id = $food->id;
                $food_options->option_title = $index;
                $food_options->save();
                $food_options->options()->saveMany($option);
            }

            if( $food instanceof Foods)
            {
                $food->food_types()->sync($request->food_types);
                $food_types_ids = $food->getFoodTypesIds();
                    return view('Admin.pages.Foods.edit', compact('food', 'food_types', 'food_types_ids'))->with('notify', ['msg' => 'Food updated successfully.', 'status' => 'success']);
            }
        }catch(\Exceptiontion $e){
            return redirect('foods-index')->with('notify', ['msg' => 'Could not update this Food, please try again.', 'status' => 'danger']);
        }
    }

    public function destroy(Foods $food){
        try{
            $food->food_types()->detach();
            $food->delete();
            return redirect('/admin/foods')->with('notify',[
                'msg' => 'Food deleted successfully',
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return redirect('/admin/foods/')->with('notify', [
                'msg'=> $e,
                'status' => "danger"
            ]);
        }
    }

}
