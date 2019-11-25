<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use Mail;

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
            $data = [
                'name_guest' => $request->Name,
                'phone' => $request->Phone,
                'email' => $request->Email,
                'address' => $request->Address,
                'total' => Cart::subtotal(0, '', ''),
                'method_payment' => $request->Payment,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
            ];

            if ($request->Content) {
                $data['note'] = $request->Content;
            };

            // insert bảng order
            $insertOrder = Order::create($data);

            // insert bảng chi tiết order
            $carts = Cart::content();
            foreach ($carts as $key => $value) {
                Order_detail::insert([
                    'product_id' => $value->id,
                    'amount' => ($value->qty*$value->price),
                    'order_id' => $insertOrder->id,
                ]);
            }
            $id_order = $insertOrder->id;
            // gui mail khach hang
            Mail::send('template_mail/order_success', array('data' => $data,'carts' => $carts,'id_order' => $id_order), function ($message) use ($data) {
                $message->to($data['email'], 'Bếp Tốt')->subject('Đặt hàng thành công!');
            });

            // gui mail admin
            $email_admin = get_option_by_key('email_admin');
        
            Mail::send('template_mail/order_success_admin', array('data' => $data, 'carts' => $carts, 'id_order' => $id_order), function ($message) use ($email_admin) {
                $message->to($email_admin, 'Bếp Tốt')->subject('Đơn hàng mới!');
            });

            Cart::destroy();
            return response([
                'messages' => 'Đặt hàng thành công',
                'errors' => false,
            ], 200);
        }

    }
}
 