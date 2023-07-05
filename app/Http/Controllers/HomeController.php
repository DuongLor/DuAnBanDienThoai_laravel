<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
		public function index(){
			$slides = Slide::all();
			$products = Product::all();
			$brands = Brand::all();
			$categories = Category::all();
			$top_5_new_product = product::orderBy('created_at', 'desc')->take(5)->get();
			return view('client.home',compact('slides','products','brands','categories','top_5_new_product'));
		}
}
