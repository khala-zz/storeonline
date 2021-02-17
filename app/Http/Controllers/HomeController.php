<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    

    public function home(){

    	$sliders = Slider::latest()-> get();
    	$categorys = Category::where('parent_id',0) -> get();
    	
    	$products = Product::latest() -> get();
    	$productRecommend = Product::latest('views_count','desc') -> take(12) -> get();
    	$categorysLimit = Category::where('parent_id',0)  -> get();
    	return view('frontend.home.home',compact('sliders','categorys','products','productRecommend','categorysLimit'));
    }
}
