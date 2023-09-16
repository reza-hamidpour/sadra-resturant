<?php

namespace App\Http\Controllers;

use App\Models\Foods_type;
use Illuminate\Http\Request;

class FoodsTypeController extends Controller
{

    public function index(){
        $foods_type = Foods_type::all();
        return view('Admin.pages.FoodsType.index', compact('foods_type'));
    }

    public function create(){
        return view('Admin.pages.FoodsType.create');
    }

    public function store(Request $request){

        $validation = [
            'type_title' => 'required|string|max:255'
        ];
        $request->validate($validation);

        $food_type = new Foods_type();
        $food_type->type_title = $request->type_title;
        $food_type->save();
        return redirect('/admin/foods_type/create')->with('notify',[
            'msg' => 'Food category created successfully.',
            'status' => 'success',
        ]);
    }

    public function show(){

    }

    public function edit(Foods_type $foods_type){

        return view('Admin.pages.FoodsType.edit', compact('foods_type'));
    }

    public function update(Foods_type $foods_type, Request $request){

        $validate = [
            'type_title' => "required|string|max:255"
        ];
        $request->validate($validate);

        try{
            $foods_type->update(['type_title' => $request->type_title]);
        }catch(\Exception $e){
            return view('Admin.pages.foodsType.update', compact('foods_type'))->with('notify',[
                'msg' => "Food Category did not update, please try again.",
                'status' => "danger"
            ]);
        }
        return view('Admin.pages.FoodsType.update', compact('foods_type'))->with('notify', [
            'msg' => "Food Category updated successfully.",
            'status' => "success"
        ]);
    }

    public function destroy(Foods_type $foods_type){
        try{

            $foods_type->Foods()->detach();
            $foods_type->delete();

            return redirect("admin/foods_type/")->with('notify', [
                'msg' => 'Category deleted successfully.',
                'status' => "success"
            ]);
        }catch(\Exception $e){
            return redirect('admin/foods_type/')->with('notify',[
                'msg' => "Category did not delete, please try again.",
                'status' => "danger"
            ]);
        }

    }

}
