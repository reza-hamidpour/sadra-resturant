<?php

namespace App\Http\Controllers;

use App\Models\Foods_type;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request){
        $page_background = asset('client-side/dist/images/bg-menu-page.jpg');
        $page_title = "Restaurant menu";
        $page_description = "The list of the best dishes in Sadra Restaurant.";
        $categories = Foods_type::all();

        return view('client-side.pages.menu', compact('categories', 'page_background', 'page_title', 'page_description'));
    }
}
