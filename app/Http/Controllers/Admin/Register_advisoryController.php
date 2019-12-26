<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register_advisory;
class Register_advisoryController extends Controller
{
    public function index(){
        $register_advisory_done = Register_advisory::orderBy('created_at','desc')->where('status',1)->paginate(10);
        return view('admin.register_advistory.done',compact('register_advisory_done'));
    }

    public function processing(){
        $register_advisory_processing = Register_advisory::orderBy('created_at','desc')->where('status',-1)->paginate(10);
        return view('admin.register_advistory.processing',compact('register_advisory_processing'));
    }

    public function delete($id){
        Register_advisory::destroy($id);
        return redirect()->back();
    }

    public function change_status(Request $r,$id){
        $register_advisory = Register_advisory::find($id);
        $register_advisory->status = 1;
        $register_advisory->save();
        return redirect('/admin/register_advisory/done');
    }

}
