<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){

        $page_background = asset('client-side/dist/images/Image-via-London-Plate-App.jpg');
        $page_title = "Gallery";
        $page_description = "The list of the latest pictures of Sadra restaurant.";

        $galleries = Gallery::all();

        return view('client-side.pages.gallery', compact('galleries','page_background', 'page_title', 'page_description'));

    }

    public function single(Gallery $gallery){

        if( $gallery->draft ==  1 )
            return abort(404);

        $page_background = $gallery->getFirstPic();
        $page_title = $gallery->title;
        $page_description = "The list of the latest pictures of Sadra restaurant.";

        return view('client-side.pages.gallery-single', compact('gallery', 'page_background', 'page_title', 'page_description'));

    }
}
