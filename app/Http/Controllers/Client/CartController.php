<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Cart;
use App\Http\Requests\Phone;
use App\Models\Product;
use App\Models\Phone_Order;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use Mail;


class CartController extends Controller
{
    public function addCart(Request $request){
        

        $product = Product::where('id',$request->id_product)->first();
        $cart = [];
        if (!is_numeric ($product->price)) {
            return redirect()->route('home_client');
        }else{
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
                    'qty' => $value->qty,
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
    public function postphone(Request $r){
        $post_data = $r->input('dataset');
        $error = array();

        if(isset($post_data) && !empty($post_data)){

            foreach ($post_data as $key => $data) {
                
                if($data['name'] == 'phone_info' ){

                    if( !isset($data['value']) && empty($data['value']) ){
                        $error['phone_info'] = "Không được bỏ trống số điện thoại"; 
                    }else{
                        //  check phone number
                        $regEx = '/^(0[1-9])+([0-9]{8})$/';
                        $phone = $data['value'];
                        $match = preg_match($regEx, $phone);
                        if($match == 0){
                            $error['phone_info'] = "Số điện thoại không đúng định dạng!";
                        }
                    }
                }
                if($data['name'] == 'product_name' ){
                    if( !isset($data['value']) && empty($data['value']) ){
                        $error['phone_info'] = "Không được bỏ trống tên sản phẩm"; 
                    }
                }
            }
        }
        if(empty($error)){
            
            $db = new Phone_Order;
            $db->phone = $post_data[0]['value'];
            $info = array();
            
            $info['product_name'] = $post_data[1]['value'];
            $info['product_id'] = $post_data[2]['value'];
            $info['sp_time'] = $post_data[3]['value'];
            
            $db->info = json_encode($info);

            $db->status = 0;

            try {
                $db->save();
                echo json_encode( array( 'status' => 200 , 'message' => 'Lưu thành công yêu cầu tư vấn!' ) );
            } catch (\Throwable $th) {
                $error['error'] = "Lưu thất bại vui lòng thử lại";
                echo json_encode( array( 'status' => 400 , 'error' => json_encode($error) ) );    
            }
            
        }else{

            echo json_encode( array( 'status' => 400 , 'error' => json_encode($error) ) );

        }
    }
}
 