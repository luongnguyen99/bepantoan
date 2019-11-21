<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use DB;
class ListCategoryController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name, GROUP_CONCAT(DISTINCT categories.slug,'.',brands.slug) as brand_slug from `categories` inner join `products` on `categories`.`id` = `products`.`category_id` inner join `brands` on `brands`.`id` = `products`.`brand_id` group by `categories`.`id`");
        return view('client.list-category',compact('categories','brands'));
    }
}
