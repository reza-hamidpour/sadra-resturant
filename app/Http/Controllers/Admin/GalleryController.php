<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{

    public function index(){

        $galleries = Gallery::all();
        return view('Admin.pages.Gallery.index', compact('galleries'));

    }

    public function create(){

        return view('Admin.pages.Gallery.create');
    }

    public function store(Gallery $gallery){

    }


    public function edit(Gallery $gallery){
        return view('Admin.pages.Gallery.edit', compact('gallery'));
    }

    public function update(Gallery $gallery){

    }

    public function destroy(Gallery $gallery){
        try{
            $gallery->delete();
            return view('Admin.pages.Gallery.index')->with('notify',[
                'msg' => "Gallery deleted successfully",
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            return view('Admin.pages.Gallery.index')->with('notify',[
                'msg' => "Gallery did not deleted, please try again.",
                'status' => "danger"
            ]);
        }


    }


}
