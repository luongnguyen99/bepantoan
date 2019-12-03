<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Crawler_product;
use App\Models\Product;
use App\Models\Gallery;
include(__DIR__.'/crawler_simple_html_dom/simple_html_dom.php');
class CrawlerController extends Controller
{
    public function index(){
        $url = [];
        $arr_product = [];
        $a = 0;
        // for ($i=1; $i <= 1; $i++) { 
            $ch = curl_init('https://beptot.vn/bep-gas-duong/?page=' . 9 . '&sort=&atr=on/');
            // nghĩa là giả mạo đang gửi từ trình duyệt nào đó, ở đây tôi dùng Firefox
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
            // Thiết lập trả kết quả về chứ không print ra
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Thời gian timeout
            curl_setopt($ch, CURLOPT_TIMEOUT, 3000);
            // Thực hiện download file
            $result = curl_exec($ch);
            // Đóng CURL
            curl_close($ch);


            $html = str_get_html($result);
            $flag = false;
            foreach ($html->find('.product-dsc > h3 > a') as $key => $value) {
                $check = Crawler_product::where('url', $value->href)->first();
                if (!$check) {
                    $flag = true;
                    $arr_product[$key]['url'] =  $value->href;
                }
            };
            if ($flag) {
                foreach ($html->find('.product-dsc > .cate_pro_title  a > img') as $key => $value) {
                    $brand = Brand::where('slug', to_slug($value->alt))->first();
                    $arr_product[$key]['brand_id'] =  !empty($brand) ? $brand->id : 1;
                    $arr_product[$key]['category_id'] = 22;
                };
            Crawler_product::insert($arr_product);
            echo '<h1>Tiếp đi bạn ơi!!!</h1>';
            }
            


        // };        
    }

    public function crawler_product_detail(){
        ini_set('max_execution_time', '0');
        $data  = Crawler_product::where('status',-1)->limit(10)->get();
        // dd($data[0]['url']);
        $arr_product = [];
        foreach ($data as $key => $product) {
           
            $arr_url = explode('/',trim($product['url'], '/'));
            $arr_url_last = $arr_url[count($arr_url)-1];
            
            $check_slug_product = Product::where('slug', $arr_url_last)->first();
        //    dd($product['url']);
            if (empty($check_slug_product)) {
                $html = file_get_html(trim($product['url'],'/'));
                $category_id = $product['category_id'];
                $brand_id = $product['brand_id'];
                $status = 1;
                if (!empty($html->find('.productdecor-details', 0)->find('h1', 0))) {
                    $name = $html->find('.productdecor-details', 0)->find('h1', 0)->plaintext;
                }else{
                    $name = 'Chưa cập nhập';
                }
                if (!empty($html->find('.price', 0)->find('del', 0)->plaintext)) {
                    $price = $html->find('.price', 0)->find('del', 0)->find('span', 0)->plaintext ?? null;
                    $sale_price = $html->find('.price > span', 0)->plaintext ?? null;
                } else {
                    $price = $html->find('.productdecor-price', 0)->plaintext ?? null;
                }
                $description = $html->find('#product-details-lists p', 0)->innertext ?? null;
                $infomation_detail = $html->find('.description-content', 0)->innertext ?? null;
                $galleries = [];

                $specifications = [];
                if (!empty($html->find('.attribute-content table tr'))) {
                    foreach ($html->find('.attribute-content table tr') as $key1 =>  $key_spec) {
                        $specifications[$key1]['key'] = $key_spec->first_child()->plaintext;
                        $specifications[$key1]['value'] = $key_spec->last_child()->plaintext;
                    };
                }

                foreach ($html->find('.fotorama  img') as $image) {
                    $arr_image = explode('/', $image->src);
                    $name_image = $arr_image[count($arr_image) - 1];
                    // echo ($image->src);
                    $galleries[] =  url('/') . '/userfiles/images/product/' . $name_image;
                    $path = public_path() . '/userfiles/images/product/' . $name_image;

                    $this->save_image('https://beptot.vn' . $image->src, $path);
                    // file_put_contents($img, $a, FILE_APPEND);
                };

                $dataInsert = [
                    'category_id' => $category_id,
                    'brand_id' => $brand_id,
                    'status' => $status,
                    'name' => $name,
                    'slug' =>  to_slug($name),
                    'description' => $description,
                    'infomation_detail' => $infomation_detail,
                ];

                if (!empty($price)) {
                    $price = str_replace(' VNĐ', '', $price);
                    $price = str_replace('.', '', $price);
                    $dataInsert['price'] = trim($price);
                };

                if (!empty($sale_price)) {
                    $sale_price = str_replace(' VNĐ', '', $sale_price);
                    $sale_price = str_replace('.', '', $sale_price);
                    $dataInsert['sale_price'] = $sale_price;
                };

                if (!empty($specifications)) {
                    $dataInsert['specifications'] = json_encode($specifications);
                }

                $insertProduct = Product::create($dataInsert);

                foreach ($galleries as $image_url) {
                    $insertGalery = Gallery::insert([
                        'product_id' => $insertProduct->id,
                        'image' => $image_url,
                    ]);
                }
                Crawler_product::where('url', $product['url'])->update(['status' => 1]);
            }else{
                Crawler_product::where('url', $product['url'])->update(['status' => 1]);
            }
            
            // dd(json_encode($specifications));

        };
        // dd($arr_product);
    }

    // public function crawler_product_detail_order_desc()
    // {
    //     ini_set('max_execution_time', '0');
    //     $data  = Crawler_product::where('status', -1)->orderBy('id','desc')->get();
    //     // dd($data[0]['url']);
    //     $arr_product = [];
    //     foreach ($data as $key => $product) {
    //         // dd($product['url']);
    //         $arr_url = explode('/', trim($product['url'], '/'));
    //         $arr_url_last = $arr_url[count($arr_url) - 1];
    //         // dd($arr_url);
    //         $check_slug_product = Product::where('slug', $arr_url_last)->exists();
           
    //         if (!$check_slug_product) {
    //             $html = file_get_html($product['url']);
    //             $category_id = $product['category_id'];
    //             $brand_id = $product['brand_id'];
    //             $status = 1;
    //             $name = $html->find('.productdecor-details', 0)->find('h1', 0)->plaintext;
    //             if (!empty($html->find('.price', 0)->find('del', 0)->plaintext)) {
    //                 $price = $html->find('.price', 0)->find('del', 0)->find('span', 0)->plaintext ?? null;
    //                 $sale_price = $html->find('.price > span', 0)->plaintext ?? null;
    //             } else {
    //                 $price = $html->find('.productdecor-price', 0)->plaintext ?? null;
    //             }
    //             $description = $html->find('#product-details-lists p', 0)->innertext ?? null;
    //             $infomation_detail = $html->find('.description-content', 0)->innertext ?? null;
    //             $galleries = [];

    //             $specifications = [];
    //             if (!empty($html->find('.attribute-content table tr'))) {
    //                 foreach ($html->find('.attribute-content table tr') as $key1 =>  $key_spec) {
    //                     $specifications[$key1]['key'] = $key_spec->first_child()->plaintext;
    //                     $specifications[$key1]['value'] = $key_spec->last_child()->plaintext;
    //                 };
    //             }
                

    //             foreach ($html->find('.fotorama  img') as $image) {
    //                 $arr_image = explode('/', $image->src);
    //                 $name_image = $arr_image[count($arr_image) - 1];
    //                 // echo ($image->src);
    //                 $galleries[] =  url('/') . '/userfiles/images/product/' . $name_image;
    //                 $path = public_path() . '/userfiles/images/product/' . $name_image;

    //                 $this->save_image('https://beptot.vn' . $image->src, $path);
    //                 // file_put_contents($img, $a, FILE_APPEND);
    //             };

    //             $dataInsert = [
    //                 'category_id' => $category_id,
    //                 'brand_id' => $brand_id,
    //                 'status' => $status,
    //                 'name' => $name,
    //                 'slug' =>  to_slug($name),
    //                 'description' => $description,
    //                 'infomation_detail' => $infomation_detail,
    //             ];

    //             if (!empty($price)) {
    //                 $price = str_replace(' VNĐ', '', $price);
    //                 $price = str_replace('.', '', $price);
    //                 $dataInsert['price'] = trim($price);
    //             };

    //             if (!empty($sale_price)) {
    //                 $sale_price = str_replace(' VNĐ', '', $sale_price);
    //                 $sale_price = str_replace('.', '', $sale_price);
    //                 $dataInsert['sale_price'] = $sale_price;
    //             };

    //             if (!empty($specifications)) {
    //                 $dataInsert['specifications'] = json_encode($specifications);
    //             }

    //             $insertProduct = Product::create($dataInsert);

    //             foreach ($galleries as $image_url) {
    //                 $insertGalery = Gallery::insert([
    //                     'product_id' => $insertProduct->id,
    //                     'image' => $image_url,
    //                 ]);
    //             }

    //             Crawler_product::where('url', $product['url'])->update(['status' => 1]);
    //         }else {
    //             Crawler_product::where('url', $product['url'])->update(['status' => 1]);
    //         }
            
    //         // dd(json_encode($specifications));

    //     };
    //     // dd($arr_product);
    // }

    public function save_image($url_image,$path){
        $ch = curl_init($url_image);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}