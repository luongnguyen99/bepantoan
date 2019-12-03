<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Products_property_values;
use App\Models\Categories_properties;
use DB;

class ListCategoryController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name, GROUP_CONCAT(DISTINCT categories.slug,'/',brands.slug) as brand_slug from `categories` inner join `products` on `categories`.`id` = `products`.`category_id` inner join `brands` on `brands`.`id` = `products`.`brand_id` group by `categories`.`id`");
        return view('client.list-category', compact('categories', 'brands'));
    }

    public function category_detail($slug, $slug2 = '')
    {
        
        $categories = Category::all();
        $category = Category::where('slug', $slug)->with('properties')->first();
        $category->properties->load('property_values');
        if (!$category) {
            abort(404);
        } else {
            $condition = [
                ['category_id', '=', $category->id],
                ['status', '=', '1']
            ];
            // Nếu có $_GET 
            if (!empty($_GET)) {
                $array_get = $_GET;
                $newArrayExcept = array_diff_key($array_get, array_flip(["hang-san-xuat", "muc-gia"]));
                $arrayExceptKey = array_values($newArrayExcept);


                if (!empty($_GET['muc-gia'])) {
                    $arr_price = explode('-', $_GET['muc-gia']);
                    if ($arr_price[0] == 'min') {
                        array_push($condition, ['price', '<', $arr_price[1]]);
                    } elseif ($arr_price[1] == 'max') {
                        array_push($condition, ['price', '>', $arr_price[0]]);
                    } elseif ($arr_price[0] != 'min' && $arr_price[1] != 'max') {
                        array_push($condition, ['price', '<=', $arr_price[0]]);
                        array_push($condition, ['price', '>=', $arr_price[0]]);
                    }
                }

                if (!empty($_GET['hang-san-xuat'])) {
                    array_push($condition, ['brand_id', '=', $_GET['hang-san-xuat']]);
                }

                if (empty($slug2)) {
                    
                    if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                        $filterValue = '';
                        foreach ($arrayExceptKey as $key => $value) {
                            $filterValue .= ' arr_id LIKE "%' . $value . '%"';
                            if ($key + 1 < count($arrayExceptKey)) {
                                $filterValue .= " and ";
                            }
                        }

                        $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->havingRaw($filterValue)
                            ->orderBy('created_at', 'desc')
                            ->limit(get_option_by_key('posts_per_page'))->get();
                    } else {
                        $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->orderBy('created_at', 'desc')
                            ->limit(get_option_by_key('posts_per_page'))->get();
                    };

                    $brands = Brand::all();
                    $brand = null;
                    return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                } else {
                    
                    $brand = Brand::where('slug', $slug2)->first();
                    array_push($condition, ['brand_id', '=', $brand->id]);
                    if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                        $filterValue = '';
                        foreach ($arrayExceptKey as $key => $value) {
                            $filterValue .= ' arr_id LIKE "%' . $value . '%"';
                            if ($key + 1 < count($arrayExceptKey)) {
                                $filterValue .= " and ";
                            }
                        }

                        $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->havingRaw($filterValue)
                            ->orderBy('created_at', 'desc')
                            ->limit(get_option_by_key('posts_per_page'))->get();
                    } else {
                        $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                            ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                            ->where($condition)
                            ->with('galleries', 'brand')
                            ->groupBy('products.id')
                            ->orderBy('created_at', 'desc')
                            ->limit(get_option_by_key('posts_per_page'))->get();
                    };

                    $brands = null;

                    return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                }
            } else {
                if (empty($slug2)) {
                    
                    $products = Product::select(
                        DB::raw('products.*'),
                        DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id')
                        )
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->orderBy('created_at', 'desc')
                        ->limit(get_option_by_key('posts_per_page'))->get();

                    // dd($products);
                    $brands = Brand::all();
                    $brand = null;
                    return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                } else {
                    $brand = Brand::where('slug', $slug2)->first();
                    array_push($condition, ['brand_id', '=', $brand->id]);
                    $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->orderBy('created_at', 'desc')
                        ->limit(get_option_by_key('posts_per_page'))->get();

                    $brands = null;
                    return view('client.category_detail', compact('products', 'category', 'brands', 'brand', 'categories'));
                }
            }
        }
    }

    public function loadmore(Request $request)
    {
        $condition = [
            ['category_id', '=', $request->category_id],
            ['status', '=', 1]
        ];
        // neu khong co arr_get
        if (empty($request->arr_get)) {
            // ko co brand_id
            if (empty($request->brand_id)) {
                $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                    ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                    ->where($condition)
                    ->with('galleries', 'brand')
                    ->groupBy('products.id')
                    ->orderBy('created_at', 'desc')
                    ->skip($request->total_post_current)
                    ->take(get_option_by_key('posts_per_page'))
                    ->get();
                // co brand_id
            } else {
                array_push($condition, ['brand_id', '=', $request->brand_id]);
                $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                    ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                    ->where($condition)
                    ->with('galleries', 'brand')
                    ->groupBy('products.id')
                    ->orderBy('created_at', 'desc')
                    ->skip($request->total_post_current)
                    ->take(get_option_by_key('posts_per_page'))
                    ->get();
            };
            // có arr_get
        } else {
            $array_get = json_decode($request->arr_get, true);
            $newArrayExcept = array_diff_key($array_get, array_flip(["hang-san-xuat", "muc-gia"]));
            $arrayExceptKey = array_values($newArrayExcept);

            // co muc gia
            if (!empty($array_get['muc-gia'])) {
                $arr_price = explode('-', $array_get['muc-gia']);
                if ($arr_price[0] == 'min') {
                    array_push($condition, ['price', '<', $arr_price[1]]);
                } elseif ($arr_price[1] == 'max') {
                    array_push($condition, ['price', '>', $arr_price[0]]);
                } elseif ($arr_price[0] != 'min' && $arr_price[1] != 'max') {
                    array_push($condition, ['price', '<=', $arr_price[0]]);
                    array_push($condition, ['price', '>=', $arr_price[0]]);
                }
            }
            // co hang-san-xuat
            if (!empty($array_get['hang-san-xuat'])) {
                array_push($condition, ['brand_id', '=', $array_get['hang-san-xuat']]);
            }

            // khong co brand_id
            if (empty($request->brand_id)) {
                if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                    $filterValue = '';
                    foreach ($arrayExceptKey as $key => $value) {
                        $filterValue .= ' arr_id LIKE "%' . $value . '%"';
                        if ($key + 1 < count($arrayExceptKey)) {
                            $filterValue .= " and ";
                        }
                    }

                    $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->havingRaw($filterValue)
                        ->orderBy('created_at', 'desc')
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                } else {
                    $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->orderBy('created_at', 'desc')
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                };


                // co brand_id
            } else {
                array_push($condition, ['brand_id', '=', $request->brand_id]);
                if (!empty($arrayExceptKey) && count($arrayExceptKey) > 0) {
                    $filterValue = '';
                    foreach ($arrayExceptKey as $key => $value) {
                        $filterValue .= ' arr_id LIKE "%' . $value . '%"';
                        if ($key + 1 < count($arrayExceptKey)) {
                            $filterValue .= " and ";
                        }
                    }

                    $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->havingRaw($filterValue)
                        ->orderBy('created_at', 'desc')
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                } else {
                    $products = Product::select(DB::raw('products.*'), DB::raw('GROUP_CONCAT( products_property_values.property_value_id ) AS arr_id'))
                        ->leftJoin('products_property_values', 'products.id', '=', 'products_property_values.product_id')
                        ->where($condition)
                        ->with('galleries', 'brand')
                        ->groupBy('products.id')
                        ->orderBy('created_at', 'desc')
                        ->skip($request->total_post_current)
                        ->take(get_option_by_key('posts_per_page'))
                        ->get();
                };
            }
        }
        ob_start();
        foreach ($products as $product) {
            ?>
            <div class="col-md-3 col-xs-6 col-sm-6" style="">
                <div class="product-item">
                    <div class="product-img">
                        <?php                         
                        if (!empty($product->sale_price)) {
                            $percent_sale = (($product->sale_price / $product->price)*100);
                            $percent_sale2 = FLOOR(100 - $percent_sale);
                            };
                        ?>
                        
                        <?php 
                            if (!empty($product->sale_price)) {
                                echo '<div class="pro-badge">
										<span>-'.$percent_sale2.'%</span>
									</div>';
                            }
                        ?>
                    
                        <div class="img-responsive">
                            <a href="<?php echo route('product_detail',['slug' => $product->slug]) ?>">
                                <?php
                                     if (count($product->galleries) > 0 && !empty($product->galleries)) {
                                        echo '<img src="'.$product->galleries[0]->image.'" alt="'.$product->name.'">';
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
                                echo '<label>'.pveser_numberformat($product->price).'</label>';
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
