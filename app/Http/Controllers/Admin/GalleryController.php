<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryTypes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{

    public function index(){

        $galleries = Gallery::all();
        return view('Admin.pages.Gallery.index', compact('galleries'));

    }

    public function create(){

        return view('Admin.pages.Gallery.create');
    }

    public function store(Gallery $gallery, Request $request){
        $validation = [
            'draft' => ['required', Rule::in([0, 1])],
            'title' => 'required|text',
            'order' => 'int',
            'index_show' => ['nullable', Rule::in([1, null])],
            'gallery_imgs*' => 'text'
        ];
        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->draft = $request->draft;
        $gallery->order = $request->order?? 0;
        $gallery->index_show = $request->index_show? 1 : 0;

        try{
            $gallery->save();
            if( $gallery  instanceof Gallery ){
                $pic_urls = [];
                foreach($request->gallery_imgs as $img ){
                    if(!empty($img))
                        $pic_urls[] = new GalleryTypes(['pic_url' => $img]);
                }
                if( count($pic_urls) > 0)
                    $gallery->gallery_types()->saveMany($pic_urls);
                return view('Admin.pages.Gallery.create')->with('notify', [
                    'msg' => 'Gallery created successfully!',
                    'status' => 'success'
                ]);
            }
        }catch(Exception $exception){
            return view('Admin.pages.Gallery.create')->with('notify',[
                'msg' => 'There were errors during creating Gallery, please try again.',
                'status' => 'danger',
            ]);
        }

    }


    public function edit(Gallery $gallery)
    {

        $gallery_pics = GalleryTypes::where('gallery_id', $gallery->id)->get();
        return view('Admin.pages.Gallery.edit', compact('gallery', 'gallery_pics'));
    }

    public function update(Gallery $gallery, Request $request){
        $validation = [
            'draft' => ['required', Rule::in([0, 1])],
            'title' => 'required|text',
            'order' => 'int',
            'index_show' => ['nullable', Rule::in([1, null])],
            'gallery_imgs*' => 'text'
        ];

        $update_data = [
            'draft' => $request->draft? 1: 0,
            'title' => $request->title,
            'order' => $request->order,
            'index_show' => $request->index_show? 1: 0,
        ];
        try{
            $gallery->update($update_data);

            $gallery->gallery_types()->delete();
            $pic_urls = [];
            foreach($request->gallery_imgs as $img ){
                if(!empty($img))
                    $pic_urls[] = new GalleryTypes(['pic_url' => $img]);
            }
            if( count($pic_urls) > 0)
                $gallery->gallery_types()->saveMany($pic_urls);
            return view('Admin.pages.Gallery.edit', compact('gallery'))->with('notify',[
                'msg' => 'Gallery updated successfully.',
                'status' => 'success',
            ]);
        }catch(Exception $exception){
            return view('Admin.pages.Gallery.edit', compact('gallery'))->with('notify',[
                'msg' => "There is an error during updating your gallery, please try again.",
                'status' => 'danger'
            ]);
        }


    }

    public function destroy(Gallery $gallery){
        $galleries = Gallery::all();
        try{
            $gallery->gallery_types()->delete();
            $gallery->delete();

            return redirect('/admin/gallery/')->with('notify',[
                'msg' => "Gallery deleted successfully",
                'status' => 'success',
            ])->with(
                'galleries', $galleries
            );
        }catch(\Exception $e){
            return redirect('gallery-index')->with('galleries', $galleries)->with('notify',[
                'msg' => "Gallery did not deleted, please try again.",
                'status' => "danger"
            ]);
        }


    }


}
