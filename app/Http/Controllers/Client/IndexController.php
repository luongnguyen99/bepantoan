<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Product,Category,Gallery,Post, Post_category};
use DB;
class IndexController extends Controller
{
    public function getList()
    {
        $categories_show_home = json_decode(get_option_by_key('categories_show_home'), true);
        // dd($categories_show_home);
        $where = 'where ';
        if (!empty($categories_show_home) && count($categories_show_home) > 0) {
            foreach ($categories_show_home as $key => $value) {
                $where .= ' categories.id = '.$value;
                if ($key+1 < count($categories_show_home)) {
                    $where .= ' or '; 
                }
            }

            $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name,
            GROUP_CONCAT(DISTINCT categories.slug,'/',brands.slug) as brand_slug
            from `categories`
            left join `products` on `categories`.`id` = `products`.`category_id`
            left join `brands` on `brands`.`id` = `products`.`brand_id` $where
            group by `categories`.`id`");
        }else{
            $categories = DB::select("select categories.*, GROUP_CONCAT(DISTINCT categories.name,' ',brands.name) AS brand_name,
            GROUP_CONCAT(DISTINCT categories.slug,'/',brands.slug) as brand_slug
            from `categories`
            left join `products` on `categories`.`id` = `products`.`category_id`
            left join `brands` on `brands`.`id` = `products`.`brand_id`
            group by `categories`.`id`
            ORDER BY RAND() LIMIT 4 ");
        };
      
        $category_advisory = Post_category::where('id',1)->with(['posts' => function($query){
             $query->orderBy('id', 'desc')->limit(10);
        }])->first();
        $category_news = Post_category::where('id',3)->with(['posts' => function($query){
            $query->orderBy('id', 'desc')->limit(4); 
        }])->first();
        
        $category_sale = Post::where('post_category_id',2)->orderBy('id', 'desc')->limit(1)->first();
        $highlights_post = Post::orderby('views', 'desc')->where('post_category_id',3)->take(4)->get();
        // dd($categories);
        return view('client.home.index',compact('category_advisory', 'category_news', 'category_sale', 'highlights_post','categories_show_home'));
    }
    public function getSearch(Request $r)
    {
        $key = $r->key;
        $arr_prd = Product::where('name', 'like', '%'.$key.'%')->select('*')->take(2)->get()->toarray();
        
        $data['cate'] = Category::where('name','like','%'.$key.'%')->select('*')->take(3)->get();
        
        if (!empty($arr_prd)) {
            foreach ($arr_prd as $key => $value) {
                if ($img_url = Gallery::where('product_id',$value['id'])->first() != null) {
                    $img_url = Gallery::where('product_id',$value['id'])->first()->toarray();
                    
                    if($img_url['image'] != null){
                        
                        $arr_prd[$key]['image'] = $img_url['image'];
                    }else{
                        $arr_prd[$key]['image'] = null;
                    }
                }
                else{
                    $arr_prd[$key]['image'] = null;
                }
            }
        }else{
            $arr_prd = [];
            
        }
        $data['prd'] = $arr_prd;

        return $data;
    }
    public function searchBtn(Request $r)
    {
        // dd('aa');
        $db = Product::where('name','like','%'.$r->search.'%')->get(); 
        
        return view('client.search',compact('db'));
    }

    public function searchEnter(Request $request){
        $products = Product::where('name', 'like', '%' . $request->search . '%')->paginate(15);
        return view('client.search', compact('products'));
    }

    public function getPage($slug)
    {
        $db = Page::where('slug',$slug)->first();
        $title =  $db->name;
       return view('client.page',compact('title','db'));
    }
    public function getSearchMobile(Request $r)
    {
        $key = $r->key;
        $arr_prd = Product::where('name', 'like', '%'.$key.'%')->select('*')->take(2)->get()->toarray();
        
        $data['cate'] = Category::where('name','like','%'.$key.'%')->select('*')->take(3)->get();
        
        if (!empty($arr_prd)) {
            foreach ($arr_prd as $key => $value) {
                if ($img_url = Gallery::where('product_id',$value['id'])->first() != null) {
                    $img_url = Gallery::where('product_id',$value['id'])->first()->toarray();
                    
                    if($img_url['image'] != null){
                        
                        $arr_prd[$key]['image'] = $img_url['image'];
                    }else{
                        $arr_prd[$key]['image'] = null;
                    }
                }
                else{
                    $arr_prd[$key]['image'] = null;
                }
            }
        }else{
            $arr_prd = [];
            
        }
        $data['prd'] = $arr_prd;
        
        return $data;
    }
}
