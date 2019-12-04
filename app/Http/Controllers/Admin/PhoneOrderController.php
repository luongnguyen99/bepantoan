<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Phone_Order;
use Validator;
class PhoneOrderController extends Controller
{
    //
    public function getphone_order(){
        $data['phone']=Phone_Order::where('status',1)->get();
        return view('admin.phone_order.phone_order',$data);
    }
    public function xuly(Request $r,$id){
        $phone=Phone_Order::find($id);
        $phone->status=2;
        $phone->save();
        return redirect('admin/phone_order/detailorder');
    }
    public function getdetailorder(){ 
        $data['phone']=Phone_Order::where('status',2)->get();
        return view('admin.phone_order.detailorder',$data);
    }
    public function getdel($id){
        Phone_Order::destroy($id);
        return redirect()->back();
    }
}
