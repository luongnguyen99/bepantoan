<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Showroom;

class ProductController extends Controller
{
    public function detail($slug){
        $product = Product::where('slug',$slug)->with('galleries')->first();
        $categories = Category::limit(12)->get();
        $productsRandom = Product::inRandomOrder()->with('galleries', 'brand')->limit(5)->get();
        $showrooms = Showroom::all();
        return view('client.single-product',compact('product', 'categories', 'productsRandom', 'showrooms'));
    }

}
