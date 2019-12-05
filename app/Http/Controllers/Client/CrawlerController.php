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
    public static function index(){
        // dd(to_slug('Việt Nam'));
        $url = [];
        $arr_product = [];
        $a = 0;
        for ($i=1; $i <= 8; $i++) { 
            $ch = curl_init('https://beptot.vn/tu-lanh/?page=' . $i . '&sort=&atr=on/');
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
            
            // $i = 0;
            if (!empty($html->find('.product-dsc',0)->innertext)) {
                foreach ($html->find('.product-dsc') as $key => $value) {

                    $check = Crawler_product::where('url', $value->find('h3 > a', 0)->href)->first();
                    $checkAlt = to_slug($value->find('.cate_pro_title  a > img', 0)->alt);
                    if (!$check && !empty($checkAlt) && $checkAlt != 'viet-nam') {
                        $arr_product[$key]['url'] =  $value->find('h3 > a', 0)->href;
                        $brand = Brand::where('slug', to_slug($value->find('.cate_pro_title  a > img', 0)->alt))->first();
                        $arr_product[$key]['brand_id'] =  !empty($brand) ? $brand->id : 1;
                        $arr_product[$key]['category_id'] = 60;
                        $arr_product[$key]['created_at'] = date('Y-m-d H:i:s');
                    };
                    $flag = true;
                };
            }
            
            // dd($check);
            Crawler_product::insert($arr_product);
            echo $i. '-----Tiếp đi bạn ơi!!!</h1>';
            
        };    
        die;
    }

    public function crawler_product_detail(){
        ini_set('max_execution_time', '0');
        $data  = Crawler_product::where('status',-1)->limit(15)->get();
        // dd($data[0]['url']);
        $arr_product = [];
        foreach ($data as $key => $product) {
           
            try {
                $arr_url = explode('/',trim($product['url'], '/'));
                $arr_url_last = $arr_url[count($arr_url)-1];
                
                $check_slug_product = Product::where('slug', $arr_url_last)->first();
        
                if (!$check_slug_product) {
                    $url = trim($product['url'], '/');
                    $html = file_get_html($url);
                    if ($html !== false and !empty($html)) {
                        $category_id = $product['category_id'];
                        $brand_id = $product['brand_id'];
                        $status = 1;
                        if (!empty($html->find('.productdecor-details', 0)->outertext)) {
                            $name = $html->find('.productdecor-details', 0)->find('h1', 0)->plaintext;
                        }else{
                            $name = 'Chưa cập nhập';
                        }
                        $check_price = $html->find('.price', 0);
                        if (!empty($check_price)) {
                            $check_price2 = $html->find('.price', 0)->find('del', 0);
                            if (!empty($check_price2)) {
                                $price = $html->find('.price', 0)->find('del', 0)->find('span', 0)->plaintext ?? null;
                                $sale_price = $html->find('.price > span', 0)->plaintext ?? null;
                            }
                            
                        } else {
                            $price = $html->find('.productdecor-price', 0)->plaintext ?? null;
                        }
                        $description = $html->find('#product-details-lists p', 0)->innertext ?? null;
                        $infomation_detail = $html->find('.description-content', 0)->innertext ?? null;
                        $galleries = [];

                        $specifications = [];
                        if (!empty($html->find('.attribute-content table tr'))) {
                            foreach ($html->find('.attribute-content table tr') as $key1 =>  $key_spec) {
                                if (!empty($key_spec->first_child())) {
                                    $specifications[$key1]['key'] = $key_spec->first_child()->plaintext;
                                }
                                if (!empty($key_spec->last_child())) {
                                    $specifications[$key1]['value'] = $key_spec->last_child()->plaintext;
                                }
                            };
                        }
                        
                        $check_name = Product::where('name', $name)->first();
                        if (!$check_name) {
                            foreach ($html->find('.fotorama  img') as $image) {
                                $arr_image = explode('/', $image->src);
                                $name_image = $arr_image[count($arr_image) - 1];
                                // echo ($image->src);die;
                                $galleries[] =  url('/') . '/userfiles/images/product/' . $name_image;
                                $path = public_path() . '/userfiles/images/product/' . $name_image;

                                $this->save_image('https://beptot.vn' . $image->src, $path);
                            };
                        }

                        $dataInsert = [
                            'category_id' => $category_id,
                            'brand_id' => $brand_id,
                            'status' => $status,
                            'name' => $name,
                            'slug' =>  to_slug($name).getToken(2),
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
                        if (!$check_name) {
                            $insertProduct = Product::create($dataInsert);

                            foreach ($galleries as $image_url) {
                                $insertGalery = Gallery::insert([
                                    'product_id' => $insertProduct->id,
                                    'image' => $image_url,
                                ]);
                            }
                        }
                    }
                    Crawler_product::where('url', $product['url'])->update(['status' => 1]);
                }else{
                    Crawler_product::where('url', $product['url'])->update(['status' => 1]);
                }
            } catch (\Throwable $th) {
                 Crawler_product::where('url', $product['url'])->update(['status' => 1]);
            }
            
            
            // dd(json_encode($specifications));

        };
        // dd($arr_product);
    }

    public function crawler_product_detail_order_desc()
    {
        ini_set('max_execution_time', '0');
        $data  = Crawler_product::where('status', -1)->limit(1)->orderBy('id','desc')->get();
        // dd($data[0]['url']);
        $arr_product = [];
        foreach ($data as $key => $product) {
            // dd($product['url']);
            $arr_url = explode('/', trim($product['url'], '/'));
            $arr_url_last = $arr_url[count($arr_url) - 1];
            // dd($arr_url);
            $check_slug_product = Product::where('slug', $arr_url_last)->exists();
           
            if (!$check_slug_product) {
                $html = file_get_html('https://beptot.vn/bep-tu-bosch-puj631bb2e/');
                $category_id = $product['category_id'];
                $brand_id = $product['brand_id'];
                $status = 1;
                $name = $html->find('.productdecor-details', 0)->find('h1', 0)->plaintext;
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

                    dd($galleries);
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
            }else {
                Crawler_product::where('url', $product['url'])->update(['status' => 1]);
            }
            
            // dd(json_encode($specifications));

            
        };
        // dd($arr_product);
    }

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
