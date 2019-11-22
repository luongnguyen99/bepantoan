<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Cart;
use App\Models\Product;
use App\Models\Category;
class CartController extends Controller
{
    public function addCart(Request $request){
        
        $product = Product::where('id',$request->id_product)->first();
        $cart = [];
    
        $cart = Cart::add([
            [
            'id' => $request->id_product,
            'name' => $product->name,
            'qty' => 1,
            'price' => !empty($product->sale_price) ? $product->sale_price : $product->price,
            'weight' => 0
            ],
        ]);
       
        if ($cart) {
           return redirect()->route('showCart');
        }
        
    }

    public function showCart(){
        $categories = Category::limit(12)->get();
        $carts = Cart::content();
        return view('client.gio-hang', compact('carts', 'categories'));
    }

    public function removeCart($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function updateCart(Request $request,$rowId){
        Cart::update($rowId, ['qty' => $request->qty]);
        return redirect()->back();
    }

    public function saveOrder(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'Name' => 'required',
                'Phone' => 'required|regex:/[0-9]{9,10}/',
                'Email' => 'required|email',
                'Address' => 'required',
                'Payment' => 'required'
            ],
            [
                'Name.required' => 'Nhập tên',
                'Phone.required' => 'Nhập số điện thoại',
                'Phone.regex' => 'Không đúng định dạng số điện thoại',
                'Email.required' => 'Nhập mail',
                'Address.required' => 'Nhập địa chỉ',
                'Payment.required' => 'Chọn phương thức thanh toán'
            ]
        );

        if ($validator->fails()) {
            return response([
                'messages' => $validator->errors(),
                'errors' => true,
            ], 200);
        }else{

            
            return response([
                'messages' => 'Đặt hàng thành công',
                'errors' => false,
            ], 200);
        }

    }
}
