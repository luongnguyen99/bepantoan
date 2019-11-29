<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Product,Category,Gallery,Page,Post};
use DB;
class IndexController extends Controller
{
    public function getList()
    {
        $highlights_post = Post::orderby('views','desc')->take(4)->get();
        return view('client.home.index',compact('highlights_post'));
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
        $db = Product::where('name','like','%'.$r->search.'%')->get(); 
        
        return view('client.search',compact('db'));
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
