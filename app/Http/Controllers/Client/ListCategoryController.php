<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories_properties;
use DB;
class ListCategoryController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name, GROUP_CONCAT(DISTINCT categories.slug,'/',brands.slug) as brand_slug from `categories` inner join `products` on `categories`.`id` = `products`.`category_id` inner join `brands` on `brands`.`id` = `products`.`brand_id` group by `categories`.`id`");
        return view('client.list-category',compact('categories','brands'));
    }

    public function category_detail($slug,$slug2 = ''){
        $category = Category::where('slug',$slug)->first();
        // $category->properties->load('property_values');
        // $properties = Categories_properties::where('category_id',$category->id)
        if (!$category) {
            abort(404);
        }else{
            if (empty($slug2)) {
                $products = Product::where('category_id',$category->id)->orderBy('created_at','desc')->limit(8)->get();
            }else{
                $brand = Brand::where('slug',$slug2)->first();
                $products = Product::where(['category_id' => $category->id,'brand_id' => $brand->id])->orderBy('created_at', 'desc')->limit(8)->get();
            }
            return view('client.category_detail',compact('products','category'));
        }
    }
}
