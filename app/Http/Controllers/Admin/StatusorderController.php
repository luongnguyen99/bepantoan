<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Status_order;

class StatusorderController extends Controller
{
    //
    public function getindex(){
        $data['status']=Status_order::all();
        return view('admin.status_order.index',$data);
    }
    public function postindex(Request $r){
        $status = new Status_order;
        $status->name=$r->name;
        $status->save();
        return redirect()->back();
    }
    public function getedit($id){
        $data['status']=Status_order::all();
        $data['id']=Status_order::find($id);
        return view('admin.status_order.edit',$data);
    }
    public function postedit(Request $r,$id){
        $status = Status_order::findOrFail($id);
        $status->name=$r->name;
        $status->save();
        return redirect('admin/status_order/index');
    }
    public function getdel($id){
        Status_order::destroy($id);
        return redirect('admin/status_order/index');
    }
}
