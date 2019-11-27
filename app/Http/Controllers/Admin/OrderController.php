<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\DataTables\DataTables;
use App\Models\Order;
use App\Models\Status_order;
class OrderController extends Controller
{
    public function getData()
    {
        $orders = Order::select()->orderBy('created_at', 'desc')->with('status')->get();
        
        return Datatables::of($orders)->make();
    }
    public function index()
    {
        $orders = Order::select()->orderBy('created_at', 'desc')->with('order_details','status')->get();
        // dd($orders);
        return view('admin.orders.index');
    }

    public function edit($id){
        $order = Order::where('id',$id)->orderBy('created_at', 'desc')->with('order_details', 'status')->first();
        $status = Status_order::all();
        return view('admin.orders.edit',compact('order','status'));
    }

    public function saveEdit(Request $request,$id){
        $order  = Order::where('id',$id)->update(['status' => $request->value]);
        return response(['err' => true]);
    }

    public function delete(Request $request)
    {
        $check = Order::where('id', $request->id)->delete();

        if ($check == 1) {
            return response(
                [
                    'err' => false,
                    'messages' => 'Xóa thành công',

                ],
                200
            );
        } else {
            return response(
                [
                    'err' => true,
                    'messages' => 'Có lỗi xảy ra',

                ],
                200
            );
        }
    }

    public function deleteMulti(Request $request)
    {

        $data = $request->data;
        $arr = explode(',', $data);
        $check = Order::destroy($arr);
        if ($check) {
            return response()->json([
                'err' => false,
                'message' => 'success',
                'data' => $arr,
            ]);
        } else {
            return response()->json([
                'err' => true,
                'message' => 'Có gì đó sai sai',
                'data' => $arr,
            ]);
        };
    }
}
