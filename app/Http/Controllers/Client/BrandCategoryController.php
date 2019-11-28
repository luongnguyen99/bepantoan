<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use DB;
class BrandCategoryController extends Controller
{
    public function brand_category($slug){
        
        $brand = DB::select("select brands.*, GROUP_CONCAT( DISTINCT categories.name, ' ', brands.name ) AS brand_name, GROUP_CONCAT( DISTINCT categories.slug, '/', brands.slug ) AS brand_slug, GROUP_CONCAT( DISTINCT categories.id) AS arr_id_category FROM brands INNER JOIN `products` ON products.brand_id = brands.id INNER JOIN categories ON products.category_id = categories.id WHERE brands.slug = '$slug' GROUP BY brands.id");
        return view('client.brand-category',compact('brand'));
    }
}
