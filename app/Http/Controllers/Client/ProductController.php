<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Showroom;
use App\Models\Comment;
use Illuminate\Http\Response; 
use Validator;  
class ProductController extends Controller
{
    public function detail($slug){
        $product = Product::where('slug',$slug)->with('galleries')->first();
        $categories = Category::limit(12)->get();
        $productsRandom = Product::inRandomOrder()->with('galleries', 'brand')->limit(5)->get();
        $showrooms = Showroom::all();

        $total_comment = Comment::where('product_id',$product->id)->count();
        $total_comment_1s = Comment::where([['rate_star' ,'=', 1],['product_id' ,'=', $product->id] ])->count();
        $total_comment_2s = Comment::where([['rate_star' ,'=', 2], ['product_id' ,'=', $product->id]])->count();
        $total_comment_3s = Comment::where([['rate_star' ,'=', 3], ['product_id' ,'=', $product->id]])->count();
        $total_comment_4s = Comment::where([['rate_star' ,'=', 4], ['product_id' ,'=', $product->id]])->count();
        $total_comment_5s = Comment::where([['rate_star' ,'=', 5], ['product_id' ,'=', $product->id]])->count();
        
        
        $avg_comment = Comment::where('product_id',$product->id)->avg('rate_star');
        
        return view('client.single-product',compact('product', 'categories', 'productsRandom', 'showrooms','avg_comment','total_comment',
                                                    'total_comment_1s',
                                                    'total_comment_2s',
                                                    'total_comment_3s',
                                                    'total_comment_4s',
                                                    'total_comment_5s'));
    }

    public function rate_star(Request $request){
       
        $validator = Validator::make(
            $request->all(),
            [
                'vote' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'content' => 'required',
            ],
            [
                'vote.required' => 'Chọn mức độ sao đánh giá',
                'name.required' => 'Nhập tên',
                'phone.required' => 'Nhập số điện thoại',
                'content.required' => 'Nhập nội dung',
            ]
        );

        if ($validator->fails()) {
            return response([
                'errors' => true,
                'messages' => $validator->errors(),
            ]);
        }else{
            $insertComment = Comment::insert([
                'name_guest' => $request->name,
                'phone' => $request->phone,
                'content' => $request->content,
                'rate_star' => $request->vote,
                'product_id' => $request->product_id,
                'created_at' => date('Y-m-d H:i:s', time()),
            ]);

            return response([
                'errors' => false,
                'messages' => 'Đánh giá thành công',
            ]);
        }
    }

    public function saveCookieHistory(Request $request){
        if (!empty($_COOKIE['arr_id_history'])) {
            $arr = json_decode($_COOKIE['arr_id_history'],true);
            if (!array_search($request->product_id, $arr)) {
                array_push($arr, $request->product_id);
                setcookie('arr_id_history', json_encode($arr), time() + (86400 * 30), "/");
            }     
        } else {
            $arr = [
                $request->product_id
            ];
            setcookie('arr_id_history',json_encode($arr),time() + (86400 * 30), "/");
        }
        
    }
}
