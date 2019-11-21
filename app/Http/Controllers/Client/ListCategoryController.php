<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
class ListCategoryController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id',0)->with('products')->get();
        $brands = Brand::all();
        dd($categories);
        return view('client.list-category',compact('categories','brands'));
    }
}
