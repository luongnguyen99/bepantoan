<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Product,Category,Gallery};
use DB;
class IndexController extends Controller
{
    public function getList()
    {
        return view('client.home.index');
    }
    public function getSearch(Request $r)
    {
        $key = $r->key;
        $arr_prd = Product::where('name', 'like', '%'.$key.'%')->select('*')->take(2)->get()->toarray();
      
        $data['cate'] = Category::where('name','like','%'.$key.'%')->select('*')->take(3)->get();
        foreach ($arr_prd as $key => $value) {
        
            $img_url = Gallery::where('product_id',$value['id'])->first()->toarray();
             $arr_prd[$key]['image'] = $img_url['image'];
        }
        $data['prd'] = $arr_prd;
        return $data;
    }
    public function searchBtn(Request $r)
    {
        $db = Product::where('name','like','%'.$r->search.'%')->get(); 
        
        return view('client.search',compact('db'));
    }
}
