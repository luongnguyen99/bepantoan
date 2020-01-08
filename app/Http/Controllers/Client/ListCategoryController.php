<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Products_property_values;
use App\Models\Categories_properties;
use App\Models\Order_brand;
use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use DB;

class ListCategoryController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categoryAll = Category::all();
        $checkIsOrder = Order_brand::groupBy('category_id')->count();
        // dd($check);
        $brand_order = Order_brand::groupBy('category_id')->with('getBrandOrder')->get();

        $inCategory = null;

        $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name, GROUP_CONCAT(DISTINCT categories.slug,'/',brands.slug) as brand_slug from `categories` inner join `products` on `categories`.`id` = `products`.`category_id` inner join `brands` on `brands`.`id` = `products`.`brand_id` group by `categories`.`id`");
        // dd($categories);
        return view('client.list-category', compact('categories', 'brands', 'categoryAll','brand_order','checkIsOrder','inCategory'));
    }

    public function category_detail($slug, $slug2 = '')
    {

        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            abort(404);
        } else {
            $category = Category::where('slug', $slug)->with('properties')->first();
            $category->properties->load('property_values');
            // code them
            $category->load('hasChildCategory');
            if (count($category->hasChildCategory) > 0) {
                $inCategory = [];
                    foreach ($category->hasChildCategory as $key => $value) {
                        $inCategory[] = $value->id;
                }
                if (empty($slug2)) {
                    $brands = Brand::all();

                    // dd($inCategory);
                    $checkIsOrder = Order_brand::whereIn('category_id',$inCategory)->count();
                    // dd($checkIsOrder);
                    $brand_order = Order_brand::rightJoin('categories','categories.id','=','order_brand.category_id')
                    ->whereIn('categories.id',$inCategory)
                    ->orderBy('categories.created_at','desc')
                    ->groupBy('categories.id')
                    ->with('getBrandOrder')->get();
                    // dd($brand_order);
                    $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name, GROUP_CONCAT(DISTINCT categories.slug,'/',brands.slug) as brand_slug from `categories` left join `products` on `categories`.`id` = `products`.`category_id` left join `brands` on `brands`.`id` = `products`.`brand_id` where categories.parent_id = $category->id group by `categories`.`id` order by created_at desc");
                    // dd($categories);
                    return view('client.list-category', compact('categories', 'brands', 'categoryAll','checkIsOrder','brand_order','inCategory'));
                }else{
                    $brand = Brand::where('slug', $slug2)->first();
                    $condition = [
                        ['products.brand_id','=',$brand->id],
                        ['products.status', '=', '1'],
                    ];
                // Nếu có $_GET
                    if (!empty($_GET)) {

                        $array_get = $_GET;
                        $newArrayExcept = array_diff_key($array_get, array_flip(["hang-san-xuat", "muc-gia","sort"]));
                        $arrayExceptKey = array_values($newArrayExcept);


                        if (!empty($_GET['muc-gia'])) {
                            $arr_price = explode('-', $_GET['muc-gia']);
                            if ($arr_price[0] == 'min') {
                                array_push($condition, ['price', '<', $arr_price[1]]);
                            } elseif ($arr_price[1] == 'max') {
                                array_push($condition, ['price', '>', $arr_price[0]]);
                            } elseif ($arr_price[0] != 'min' && $arr_price[1] != 'max') {
                                array_push($condition, ['price', '<=', $arr_price[1]]);
                                array_push($condition, ['price', '>=', $arr_price[0]]);
                            }
                        }

                        if (!empty($_GET['hang-san-xuat'])) {
                            array_push($condition, ['products.brand_id', '=', $_GET['hang-san-xuat']]);
                        }

                        if (!empty($_GET['sort'])) {
                            if ($_GET['sort'] == 'asc') {
                                $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'asc'];
                            }elseif($_GET['sort'] == 'desc'){
                                $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'desc'];
                            }
                        }else{
                            if (get_option_by_key('sort_by') == 'stt') {
                                $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
                            }elseif(get_option_by_key('sort_by') == 'brand'){
                                $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
                            }else{
                                $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
                            }

                        }


                        if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                            $filterValue = '';
                            foreach ($arrayExceptKey as $key => $value) {
                                if ($value == 5) {
                                    $filterValue .= ' arr_id LIKE "'. $value . '%"';

                                }else{
                                    $filterValue .= ' arr_id LIKE "%'. $value . '%"';
                                }

                                if ($key + 1 < count($arrayExceptKey)) {
                                    $filterValue .= " and ";
                                }
                            }

                            $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                                ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                                ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                                ->whereColumn('order_brand.category_id','=','products.category_id')
                                ->where($condition)
                                ->whereIn('products.category_id',$inCategory)
                                ->with('galleries', 'brand')
                                ->groupBy('products.id')
                                ->havingRaw($filterValue)
                                ->orderBy($order_by['key'],$order_by['value'])
                                ->limit(get_option_by_key('posts_per_page'))->get();
                        } else {
                            $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                                ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                                ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                                ->whereColumn('order_brand.category_id','=','products.category_id')
                                ->where($condition)
                                ->whereIn('products.category_id',$inCategory)
                                ->with('galleries', 'brand')
                                ->groupBy('products.id')
                                ->orderBy($order_by['key'],$order_by['value'])
                                ->limit(get_option_by_key('posts_per_page'))->get();

                        };

                        $brands = null;

                        return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));

                    } else {
                        if (get_option_by_key('sort_by') == 'stt') {
                            $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
                        }elseif(get_option_by_key('sort_by') == 'brand'){
                            $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
                        }else{
                            $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
                        }

                        $brand = Brand::where('slug', $slug2)->first();
                        array_push($condition, ['products.brand_id', '=', $brand->id]);
                        $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                            ->whereColumn('order_brand.category_id','=','products.category_id')
                            ->where($condition)
                            ->whereIn('products.category_id',$inCategory)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->orderBy($order_by['key'], $order_by['value'])
                            ->limit(get_option_by_key('posts_per_page'))->get();

                        $brands = null;

                        return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));

                    }
                }

            }else{

                $condition = [
                    ['products.status', '=', '1'],
                ];
                // Nếu có $_GET
                if (!empty($_GET)) {

                    $array_get = $_GET;
                    $newArrayExcept = array_diff_key($array_get, array_flip(["hang-san-xuat", "muc-gia","sort"]));
                    $arrayExceptKey = array_values($newArrayExcept);


                    if (!empty($_GET['muc-gia'])) {
                        $arr_price = explode('-', $_GET['muc-gia']);
                        if ($arr_price[0] == 'min') {
                            array_push($condition, ['price', '<', $arr_price[1]]);
                        } elseif ($arr_price[1] == 'max') {
                            array_push($condition, ['price', '>', $arr_price[0]]);
                        } elseif ($arr_price[0] != 'min' && $arr_price[1] != 'max') {
                            array_push($condition, ['price', '<=', $arr_price[1]]);
                            array_push($condition, ['price', '>=', $arr_price[0]]);
                        }
                    }

                    if (!empty($_GET['hang-san-xuat'])) {
                        array_push($condition, ['products.brand_id', '=', $_GET['hang-san-xuat']]);
                    }

                    if (!empty($_GET['sort'])) {
                        if ($_GET['sort'] == 'asc') {
                            $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'asc'];
                        }elseif($_GET['sort'] == 'desc'){
                            $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'desc'];
                        }
                    }else{
                        if (get_option_by_key('sort_by') == 'stt') {
                            $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
                        }elseif(get_option_by_key('sort_by') == 'brand'){
                            $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
                        }else{
                            $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
                        }

                    }

                    if (empty($slug2) && $slug2 == "") {
                        // dd($condition);
                        if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                            $filterValue = '';
                            foreach ($arrayExceptKey as $key => $value) {
                                if ($value == 5) {
                                    $filterValue .= ' arr_id LIKE "'. $value . '%"';

                                }else{
                                    $filterValue .= ' arr_id LIKE "%'. $value . '%"';
                                }

                                if ($key + 1 < count($arrayExceptKey)) {
                                    $filterValue .= " and ";
                                }
                            }
                            // dd($filterValue);
                            $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                                ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                                ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                                ->whereColumn('order_brand.category_id','=','products.category_id')
                                ->where($condition)
                                ->with('galleries', 'brand')
                                ->groupBy('products.id')
                                ->havingRaw($filterValue)
                                ->orderBy($order_by['key'],$order_by['value'])
                                ->limit(get_option_by_key('posts_per_page'))->get();
                        //   dd($products);

                        } else {
                            $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                                ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                                ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                                ->whereColumn('order_brand.category_id','=','products.category_id')
                                ->where($condition)
                                ->with('galleries', 'brand')
                                ->groupBy('products.id')
                                ->orderBy($order_by['key'],$order_by['value'])
                                ->limit(get_option_by_key('posts_per_page'))->get();
                                // dd($condition);
                        };

                        $brands = Brand::select('brands.*')
                            ->join('products','products.brand_id','=','brands.id')
                            ->join('categories','products.category_id','=','products.category_id')
                            ->where('categories.id',$category->id)
                            ->groupBy('brands.id')->get();

                        $brand = null;
                        // dd($brands);
                        return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                    } else {
                        $brand = Brand::where('slug', $slug2)->first();


                        if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                            $filterValue = '';
                            foreach ($arrayExceptKey as $key => $value) {
                                if ($value == 5) {
                                    $filterValue .= ' arr_id LIKE "'. $value . '%"';

                                }else{
                                    $filterValue .= ' arr_id LIKE "%'. $value . '%"';
                                }

                                if ($key + 1 < count($arrayExceptKey)) {
                                    $filterValue .= " and ";
                                }
                            }

                            $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                                ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                                ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                                ->whereColumn('order_brand.category_id','=','products.category_id')
                                ->where($condition)
                                ->with('galleries', 'brand')
                                ->groupBy('products.id')
                                ->havingRaw($filterValue)
                                ->orderBy($order_by['key'],$order_by['value'])
                                ->limit(get_option_by_key('posts_per_page'))->get();
                        } else {
                            $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                                ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                                ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                                ->whereColumn('order_brand.category_id','=','products.category_id')
                                ->where($condition)
                                ->with('galleries', 'brand')
                                ->groupBy('products.id')
                                ->orderBy($order_by['key'],$order_by['value'])
                                ->limit(get_option_by_key('posts_per_page'))->get();

                        };

                        $brands = null;

                        return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                    }
                } else {
                    if (get_option_by_key('sort_by') == 'stt') {
                        $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
                    }elseif(get_option_by_key('sort_by') == 'brand'){
                        $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
                    }else{
                        $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
                    }
                    if (empty($slug2)) {

                        $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                            ->whereColumn('order_brand.category_id','=','products.category_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->orderBy($order_by['key'], $order_by['value'])
                            ->limit(get_option_by_key('posts_per_page'))->get();

                        // dd($products);
                        $brands = Brand::select('brands.*')
                            ->join('products','products.brand_id','=','brands.id')
                            ->join('categories','categories.id','=','products.category_id')
                            ->where('categories.id',$category->id)
                            ->groupBy('brands.id')->get();
                        // dd($brands);
                        $brand = null;
                        return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                    } else {
                        $brand = Brand::where('slug', $slug2)->first();
                        array_push($condition, ['products.brand_id', '=', $brand->id]);
                        $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                            ->whereColumn('order_brand.category_id','=','products.category_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->orderBy($order_by['key'], $order_by['value'])
                            ->limit(get_option_by_key('posts_per_page'))->get();

                        $brands = null;

                        return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                    }
                }
            }

        }
    }

    public function loadmore(Request $request)
    {
        $condition = [
            ['products.status', '=', 1]
        ];

        if (get_option_by_key('sort_by') == 'stt') {
            $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
        }elseif(get_option_by_key('sort_by') == 'brand'){
            $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
        }else{
            $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
        }

        $category = Category::where('id', $request->category_id)->with('properties')->first();
        $category->properties->load('property_values');
        // code them
        $category->load('hasChildCategory');
        if (count($category->hasChildCategory) > 0) {
            $inCategory = [];
                foreach ($category->hasChildCategory as $key => $value) {
                    $inCategory[] = $value->id;
            };
            // neu khong co arr_get
            array_push($condition, ['products.brand_id', '=', $request->brand_id]);
            if (empty($request->arr_get)) {
                $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                    ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                    ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                    ->whereColumn('order_brand.category_id','=','products.category_id')
                    ->where($condition)
                    ->whereIn('products.category_id',$inCategory)
                    ->with('galleries', 'brand')
                    ->groupBy('products.id')
                    ->orderBy($order_by['key'], $order_by['value'])
                    ->skip($request->total_post_current)
                    ->take(get_option_by_key('posts_per_page'))
                    ->get();

                // có arr_get
            } else {
                $array_get = json_decode($request->arr_get, true);
                // dd($request->arr_get);
                $newArrayExcept = array_diff_key($array_get, array_flip(["hang-san-xuat", "muc-gia","sort" ]));
                $arrayExceptKey = array_values($newArrayExcept);
                // dd($arrayExceptKey);
                // co muc gia
                if (!empty($array_get['muc-gia'])) {
                    $arr_price = explode('-', $array_get['muc-gia']);
                    if ($arr_price[0] == 'min') {
                        array_push($condition, ['price', '<', $arr_price[1]]);
                    } elseif ($arr_price[1] == 'max') {
                        array_push($condition, ['price', '>', $arr_price[0]]);
                    } elseif ($arr_price[0] != 'min' && $arr_price[1] != 'max') {
                        array_push($condition, ['price', '<=', $arr_price[1]]);
                        array_push($condition, ['price', '>=', $arr_price[0]]);
                    }
                }

                if (!empty($array_get['sort'])) {
                    if ($array_get['sort'] == 'asc') {
                        $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'asc'];
                    }elseif($array_get['sort'] == 'desc'){
                        $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'desc'];
                    }
                }else{
                    if (get_option_by_key('sort_by') == 'stt') {
                        $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
                    }elseif(get_option_by_key('sort_by') == 'brand'){
                        $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
                    }else{
                        $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
                    }

                }


                if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                    $filterValue = '';
                    foreach ($arrayExceptKey as $key => $value) {
                        if ($value == 5) {
                            $filterValue .= ' arr_id LIKE "'. $value . '%"';
                        }else{
                            $filterValue .= ' arr_id LIKE "%'. $value . '%"';
                        }
                        if ($key + 1 < count($arrayExceptKey)) {
                            $filterValue .= " and ";
                        }
                    }

                    $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                        ->whereColumn('order_brand.category_id','=','products.category_id')
                        ->where($condition)
                        ->whereIn('products.category_id',$inCategory)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->havingRaw($filterValue)
                        ->orderBy($order_by['key'],$order_by['value'])
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                } else {
                    $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                        ->whereColumn('order_brand.category_id','=','products.category_id')
                        ->where($condition)
                        ->whereIn('products.category_id',$inCategory)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->orderBy($order_by['key'],$order_by['value'])
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                };

            }
        }else{
            array_push($condition, ['products.category_id', '=', $request->category_id]);

            // neu khong co arr_get
            if (empty($request->arr_get)) {

                // ko co brand_id
                if (empty($request->brand_id)) {
                    $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                        ->whereColumn('order_brand.category_id','=','products.category_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->orderBy($order_by['key'], $order_by['value'])
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                    // co brand_id
                } else {
                    array_push($condition, ['products.brand_id', '=', $request->brand_id]);
                    $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                        ->whereColumn('order_brand.category_id','=','products.category_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->orderBy($order_by['key'], $order_by['value'])
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                };
                // có arr_get
            } else {
                $array_get = json_decode($request->arr_get, true);
                // dd($request->arr_get);
                $newArrayExcept = array_diff_key($array_get, array_flip(["hang-san-xuat", "muc-gia","sort" ]));
                $arrayExceptKey = array_values($newArrayExcept);
                // dd($arrayExceptKey);
                // co muc gia
                if (!empty($array_get['muc-gia'])) {
                    $arr_price = explode('-', $array_get['muc-gia']);
                    if ($arr_price[0] == 'min') {
                        array_push($condition, ['price', '<', $arr_price[1]]);
                    } elseif ($arr_price[1] == 'max') {
                        array_push($condition, ['price', '>', $arr_price[0]]);
                    } elseif ($arr_price[0] != 'min' && $arr_price[1] != 'max') {
                        array_push($condition, ['price', '<=', $arr_price[1]]);
                        array_push($condition, ['price', '>=', $arr_price[0]]);
                    }
                }
                // co hang-san-xuat
                if (!empty($array_get['hang-san-xuat'])) {
                    array_push($condition, ['products.brand_id', '=', $array_get['hang-san-xuat']]);
                }

                if (!empty($array_get['sort'])) {
                    if ($array_get['sort'] == 'asc') {
                        $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'asc'];
                    }elseif($array_get['sort'] == 'desc'){
                        $order_by = [ 'key' => DB::raw('IF(sale_price IS NULL or sale_price = "", price , sale_price)'), 'value' => 'desc'];
                    }
                }else{
                    if (get_option_by_key('sort_by') == 'stt') {
                        $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
                    }elseif(get_option_by_key('sort_by') == 'brand'){
                        $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
                    }else{
                        $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
                    }

                }

                // khong co brand_id
                if (empty($request->brand_id)) {
                    if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                        $filterValue = '';
                        foreach ($arrayExceptKey as $key => $value) {
                            if ($value == 5) {
                                $filterValue .= ' arr_id LIKE "'. $value . '%"';
                            }else{
                                $filterValue .= ' arr_id LIKE "%'. $value . '%"';
                            }
                            if ($key + 1 < count($arrayExceptKey)) {
                                $filterValue .= " and ";
                            }
                        }

                        $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                            ->whereColumn('order_brand.category_id','=','products.category_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->havingRaw($filterValue)
                            ->orderBy($order_by['key'],$order_by['value'])
                            ->skip($request->total_post_current)
                            ->take(get_option_by_key('posts_per_page'))
                            ->get();
                    } else {
                        $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                            ->whereColumn('order_brand.category_id','=','products.category_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->orderBy($order_by['key'],$order_by['value'])
                            ->skip($request->total_post_current)
                            ->take(get_option_by_key('posts_per_page'))
                            ->get();
                    };


                    // co brand_id
                } else {
                    array_push($condition, ['products.brand_id', '=', $request->brand_id]);
                    if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                        $filterValue = '';
                        foreach ($arrayExceptKey as $key => $value) {
                            if ($value == 5) {
                                $filterValue .= ' arr_id LIKE "'. $value . '%"';
                            }else{
                                $filterValue .= ' arr_id LIKE "%'. $value . '%"';
                            }
                            if ($key + 1 < count($arrayExceptKey)) {
                                $filterValue .= " and ";
                            }
                        }

                        $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                            ->whereColumn('order_brand.category_id','=','products.category_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->havingRaw($filterValue)
                            ->orderBy($order_by['key'],$order_by['value'])
                            ->skip($request->total_post_current)
                            ->take(get_option_by_key('posts_per_page'))
                            ->get();
                    } else {
                        $products = Product::select(DB::raw('products.*,IF(sale_price IS NULL or sale_price = "", price , sale_price) as price_order'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
                            ->whereColumn('order_brand.category_id','=','products.category_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->orderBy($order_by['key'],$order_by['value'])
                            ->skip($request->total_post_current)
                            ->take(get_option_by_key('posts_per_page'))
                            ->get();
                    };
                }
            }
        }


        ob_start();
        // dd($products);
        foreach ($products as $product) {
            ?>
            <div class="col-md-5h col-xs-6 col-sm-6" style="">
                <div class="product-item">
                    <div class="product-img">
                        <?php
                        if (!empty($product->sale_price) && $product->price != 0) {
                            $percent_sale = (($product->sale_price / $product->price)*100);
                            $percent_sale2 = FLOOR(100 - $percent_sale);
                            };
                        ?>

                        <?php
                            if (!empty($product->sale_price) && $product->price != 0) {
                                echo '<div class="pro-badge">
										<span>-'.$percent_sale2.'%</span>
									</div>';
                            }
                        ?>

                        <div class="img-responsive">
                            <a href="<?php echo route('product_detail',['slug' => $product->slug]) ?>">
                                <?php
                                     if (count($product->galleries) > 0 && !empty($product->galleries)) {
                                        echo '<img src="'.(!empty($product->galleries[0]->image) ? $product->galleries[0]->image : asset('client/img/default_product.png')).'" alt="'.$product->name.'">';
                                    }else{
                                        echo '<img src="'.asset('client/img/default_product.png').'" alt="'.$product->name.'">';
                                    };
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="product-dsc">
                        <h3><a href="<?php echo route('product_detail',['slug' => $product->slug]) ?>"><?php echo $product->name ?></a></h3>
                        <div class="cate_pro_title">

                            <a href="#" class="prdBrand">
                                <?php
                                    echo '<img alt="'.$product->brand->name.'" src="'.$product->brand->image.'">';
                                ?>
                            </a>
                        </div>

                        <?php
                            if (!empty($product->gift)) {
                                $arr_gift = json_decode($product->gift, true);
                                foreach ($arr_gift as $gift) {
                                    echo '<div class="gift-sale">
											<strong>'.$gift['value'].'</strong>
										</div>';
                                }
                            }
                        ?>

                        <div class="cate_pro_bot">
                        <?php
                            if (!empty($product->sale_price)) {
                               echo '<label>'.pveser_numberformat($product->sale_price).'</label><span>'.pveser_numberformat($product->price).'</span>';

                            }else{
                                echo '<label>'.($product->price == 0 ? 'Liên hệ' : pveser_numberformat($product->price)).'</label>';
                            }
                        ?>
                        </div>
                    </div>
                    <div class="actions-btn">
                        <a href="<?php echo route('product_detail',['slug' => $product->slug]) ?>"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo route('product_detail',['slug' => $product->slug]) ?>" class="buy_now"><i class="fa fa-shopping-basket"></i></a>
                    </div>
                </div>
            </div>
    <?php
        }
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }
}
