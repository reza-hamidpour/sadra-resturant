<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){

       $about_us = ['title' => "SADRA RESTURANT" , "body" => "At Sadra, we care about your health and ours. Our staff maintain the highest levels of personal hygiene and we make sure the equipment are being sanitized carefully and vigorously. Your safety and peace of mind matters the most when we serve you.A restaurant is a business that connects people through delicious food, comfortable space, and memorable service. We believe that the greatest restaurants not only connect people, but also build lasting relationships, both staff-to-guest and staff-to-staff."];

        $popular_items = $this->popular_items();
        $gallery = $this->getGallery();



       return view('client-side.index', compact('about_us', 'popular_items', 'gallery'));

   }

   public function popular_items(){
       return Foods::take(8)->get();
   }

   protected function getGallery(){

       return Gallery::take(10)->get();

   }

}
