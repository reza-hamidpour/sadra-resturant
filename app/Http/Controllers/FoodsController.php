<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Foods_type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            "price" => "required|float",
            "ratio" => "integer",
            "pic_url" => "string",
            "need_age_check" => "bool",
            "order" => "integer",
            "draft" => "bool",
            "food_types.*" => ['required', 'integer', Rule::in($types)]
        ];
        $request->validate($validate);

        $food = new Foods();
        $food->title = $request->title;
        $food->slug = $request->title;
        $food->price = $request->price;
        $food->ratio = 0;
        $food->pic_url = $request->pic_url;
        $food->need_age_check = $request->need_age_check;
        $food->order = $request->order;
        $food->draft = $request->draft;

        $type_ids = $request->type_ids;

        $food->save();

        if( $food instanceof Foods){

            $food->FoodType()->sync($type_ids);
            return redirect('foods-index')->with('notify', ['msg'=>"Food Successfully added", "status" => "success"]);
        }
        return view("Admin.pages.Foods.create")->with('notify', ["msg" => "Something went wrong, please try again", "status" => "danger"]);
    }

    public function show(Foods $food){

        $food_types = Foods_type::all();

        return view('Admin.pages.Foods.edit', compact('food', 'food_types'));
    }

    public function update(Foods $food, Request $request){

        $types = Foods_type::all();
        $validate = [
            "title" => "required|string|max:255",
            "price" => "required|float",
            "pic_url" => "nullable|string",
            "need_age_check" => "boolean|nullable",
            "draft" => "boolean",
            "type_ids.*" => ['required', 'integer', Rule::in($types)],
        ];

        $request->validate($validate);

        $data = [
            'title' => $request->title,
            'price' => $request->price,
            'pic_url' => $request->pic_url,
            'need_age_check' => $request->need_age_check,
            'draft' => $request->draft,
        ];

        try{

            $food->update($data);
            if( $food instanceof Foods)
            {
                $food->FoodType()->sync($request->food_types);
                return view('Admin.pages.Foods.edit', compact('food', 'types'))->with('notify', ['msg' => 'Food updated successfully.', 'status' => 'success']);
            }
        }catch(\Exceptiontion $e){
            return redirect('foods-index')->with('notify', ['msg' => 'Could not update this Food, please try again.', 'status' => 'danger']);
        }
    }

    public function destroy(Foods $food){
        try{
            $food->FoodType()->detach();
            $food->delete();
        }catch(\Exception $e){
            return redirect('foods-index')->with('notify', [
                'msg'=> $e,
                'status' => "danger"
            ]);
        }
    }

}
