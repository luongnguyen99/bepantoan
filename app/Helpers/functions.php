<?php
use App\Models\Product;
use App\Models\Option;
use App\Models\Category;
use App\Models\Order;
use App\Models\Brand;
use Jenssegers\Agent\Agent as Agent;

if (!function_exists('activeNav')) {
    function activeNav($segment_2 = '', $segment_3 = '')
    {
        if ($segment_2 == '' && Request::segment(2) == $segment_2 && Request::segment(3) == $segment_2 && $segment_2 == $segment_3) {
            return 'active';
        } else {
            if (Request::segment(2) === $segment_2) {
                if (empty($segment_3)) {
                    return 'active';
                } else {
                    if (in_array(Request::segment(3), ['list', 'index', '', null]) && in_array($segment_3, ['list', 'index', '', null])) {
                        return 'active';
                    } elseif (Request::segment(3) == $segment_3) {
                        return 'active';
                    } else {
                        return '';
                    }
                }
            }
        }
    }
}

if (!function_exists('to_slug')) {
    function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
if (!function_exists('get_detail_products_by_id')) {
    function get_detail_products_by_id($id)
    {
        $products = Product::where('id', $id)->with('galleries', 'brand')->first();
        return $products;
    };
}

// get product
if (!function_exists('get_products_by_category_id')) {
    function get_products_by_category_id($id){

        $category = Category::where('id', $id )->first();
        $category->load('hasChildCategory');
        //
        $Agent = new Agent();
        $limit = $Agent->isMobile() ? 6 : 5;
        if (get_option_by_key('sort_by') == 'stt') {
            $order_by = [ 'key' => 'products.stt', 'value' => 'desc'];
        }elseif(get_option_by_key('sort_by') == 'brand'){
            $order_by = [ 'key' => DB::raw('order_brand.order_position'), 'value' => 'asc'];
        }else{
            $order_by = [ 'key' => 'products.created_at', 'value' => 'desc'];
        }
        if (count($category->hasChildCategory) == 0) {
            $products = Product::select(DB::raw('products.*'),DB::raw('order_brand.order_position as position'))
            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')->where('products.category_id',$id)
            ->whereColumn('order_brand.category_id','=','products.category_id')
            ->orderBy($order_by['key'],$order_by['value'])
            ->with('galleries','brand')->limit($Agent->isMobile() ? 6 : 5)->get();
            // dd($products);
        }else{
            $inCategory = [];
            foreach ($category->hasChildCategory as $key => $value) {
                $inCategory[] = $value->id;
            }

            $products = Product::select(DB::raw('products.*'),DB::raw('order_brand.order_position as position'))
            ->leftJoin('order_brand','order_brand.brand_id','=','products.brand_id')
            ->whereColumn('order_brand.category_id','=','products.category_id')
            ->whereIn('products.category_id',$inCategory)
            ->orderBy($order_by['key'],$order_by['value'])
            ->with('galleries','brand')->limit($Agent->isMobile() ? 6 : 5)->get();
        }
        // dd($products);
        return $products;

    };
}

// get product option
if (!function_exists('get_products_by_category_id_option')) {
    function get_products_by_category_id_option($id){
        $checkCategory = Category::where('parent_id',$id)->get();
        $inCategory = [];
        if (count($checkCategory) != 0) {
            foreach ($checkCategory as $key => $value) {
                $inCategory[] = $value->id;
            }
        }else{
            $inCategory = [(int)$id];
        }

        $products = Product::select('id','name')->whereIn('category_id',$inCategory)->get()->toArray();
        // dd($products);
        return $products;

    };
}


// get product relation
if (!function_exists('get_products_relation_by_category_id')) {
    function get_products_relation_by_category_id($id,$price){
        $checkCategory = Category::where('parent_id',$id)->get();
        $Agent = new Agent();
        $limit = $Agent->isMobile() ? 6 : 5;
        // // dd($limit);
        // if (count($checkCategory) == 0) {
            $products = Product::select(DB::raw('products.*'))
            ->with('galleries','brand')
            ->where('products.category_id',$id)
            ->whereBetween(DB::raw('IF(sale_price <> NULL OR sale_price <> "",sale_price,price)'),[$price-5000000,$price+5000000])
            ->limit($Agent->isMobile() ? 6 : 5)->get();
            // dd($products);
        // }else{
        //     $inCategory = [];
        //     foreach ($checkCategory as $key => $value) {
        //         $inCategory[] = $value->id;
        //     }

        //     $products = Product::select(DB::raw('products.*'))
        //     ->whereIn('products.category_id',$inCategory)
        //     ->whereBetween(DB::raw('IF(sale_price <> NULL OR sale_price <> "",sale_price,price)'),[$price-5000000,$price+5000000])
        //     ->with('galleries','brand')->limit($Agent->isMobile() ? 6 : 5)->get();
        // }
        // dd($products);
        return $products;

    };
}

// number format
if (!function_exists('pveser_numberformat')) {
    function pveser_numberformat($price){
        $price =  number_format($price, 0, '', '.').'đ';
        return $price;
    }
}
// get category
if (!function_exists('get_category_by_id')) {
    function get_category_by_id($id)
    {
        $category = Category::where(['id' => $id])->first();
        return $category;
    }
}

// get product
if (!function_exists('get_product_by_id')) {
    function get_product_by_id($id)
    {
        $product = Product::where(['id' => $id])->with('galleries')->first();
        return $product;
    }
}

// get brand
if (!function_exists('get_brand_by_id')) {
    function get_brand_by_id($id)
    {
        $brand = Brand::where(['id' => $id])->first();
        return $brand;
    }
}


if (!function_exists('count_order_awaiting_approval')) {
    function count_order_awaiting_approval(){
        $count = Order::where('status',1)->count();
        return $count ?? 0;
    }
}

//==============>Validate Input<=====================
function showError($errors, $nameInput)
{
    if ($errors->has($nameInput)) {
        echo '<div class="alert alert-danger" style="opacity:0.5">';
        echo '<strong>'.$errors->first($nameInput).'</strong>';
        echo '</div>';
    }
}
//==============>Get Category<=====================
function GetCategory($category, $parent, $shift, $id_select)
{
    foreach ($category as $value) {
        if ($value['parent_id'] == $parent) {
            if ($value['id'] == $id_select) {
                echo '<option value='.$value['id'].' selected>'.$shift.$value['name'].'</option>';
            } else {
                echo '<option value='.$value['id'].'>'.$shift.$value['name'].'</option>';
            }

            GetCategory($category, $value['id'], $shift.'----|', $id_select);
        }
    }
}
//==============>Show Category<=====================
function ShowCategory($category, $parent, $shift)
{
    foreach ($category as $value) {
        if ($value['parent_id'] == $parent) {
            echo '
        <tr>
            <td>'.$shift.$value['name'].'</td>
                <td>
                <a href="/admin/post_categories/edit/'.$value['id'].'" class="btn btn-warning" >Edit</a>
                <a href="/admin/post_categories/del/'.$value['id'].'" class="btn btn-danger" role="button">Del</a>
                </td>
            </td>
        </tr>';
            ShowCategory($category, $value['id'], $shift.'----|');
        }
    }
}
//=================>Cut Content<======================
function get_excerpt($content, $number)
{

    $excerpt = $content;

    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);

    $excerpt = strip_tags($excerpt);

    $excerpt = substr($excerpt, 0, $number);

    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));

    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt."...";
}

// =================> Get option <================= //
function get_option_by_key($key){
    try {
        $option = Option::where('key',$key)->first();
        return $option->value;
    } catch (Throwable $th) {
        return false;
    }

}

// ================> Build Tree category <=================== //
function check_last_child($dataArr , $id){
    $check = true;
    foreach ($dataArr as $key => $value) {

        if( $value['parent'] == $id  ){
            $check = false;

            break;
        }
    }
    return $check;
}

function build_categories_tree(){
    try {
        $categories = Category::all();
        $dataArr = array();
        foreach ($categories as $key => $value) {
            $dataArr[] = array(
                'id' => $value->id,
                'name' => $value->name,
                'image' => $value->image,
                'parent' => $value->parent_id,
            );
        }
        $dataset = group_list_tree($dataArr);
        return $dataset;
    } catch (\Throwable $th) {
        return false;
    }
}
function group_list_tree( $dataArr){

    $dataResult = array();
    foreach ($dataArr as $key => $value) {
        if( $value['parent'] == 0 ){
            $dataResult[$value['id']] = array();
            unset($dataArr[$key]);
        }else{
            if( isset($dataResult[$value['parent']])  ){
                $dataResult[$value['parent']][] = $value['id'];
            }else{
                foreach ($dataResult as $loop => $item) {
                    if(in_array( $value['parent'] ,  $item )){
                        $dataResult[$loop][] = $value['id'];
                    }
                }
            }
        }
    }
    return $dataResult;
}


// make header category  product

function show_heder_list_cate(){
    try {
        $all_cate = Category::where('parent_id',0)->get()->toarray();
        if(isset($all_cate) && !empty($all_cate)){
            return $all_cate;
        }else{
            return flase;
        }
    } catch (\Throwable $th) {
        return false;
    }
}

// ============> GET CATEGORY PRODUCT NAME <===========
function get_product_category_url( $slug_product , $slug_brand = null ){
    return route('category_detail', array( 'slug' => $slug_product , 'slug2'=> $slug_brand ));
}



if (!function_exists('getToken')) {
    function getToken($length = 12)
    {
        $token = '';
        $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= time();
        $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
        $codeAlphabet .= '0123456789';
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; ++$i) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }
}

function get_detail_category_by_id_show_home($id){
    //  $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name,
    //         GROUP_CONCAT(DISTINCT categories.slug,'/',brands.slug) as brand_slug
    //         from `categories`
    //         inner join `products` on `categories`.`id` = `products`.`category_id`
    //         inner join `brands` on `brands`.`id` = `products`.`brand_id`
    //         where categories.`id` = $id
    //         group by `categories`.`id`");

    $category = Category::where('id',$id)->first();
    return $category;
}

if (!function_exists('show_brand_by_id_category')) {
    function show_brand_by_id_category($id){
        $checkCategory = Category::where('parent_id',$id)->get();
        $inCategory = [];
        if (count($checkCategory) != 0) {
            foreach ($checkCategory as $key => $value) {
                $inCategory[] = $value->id;
            }
        }else{
            $inCategory = [(int)$id];
        }

        $brands = Brand::select('brands.*')
                ->join('products','brands.id','=','products.brand_id')
                ->join('categories','categories.id','=','products.category_id')
                ->whereIn('categories.id',$inCategory)
                ->groupBy('brands.id')->get();
        return json_decode($brands,true);
    }
}

function check_device(){
    $Agent = new Agent();
    $limit = $Agent->isMobile() ? 6 : 5;
	return $limit;
}

