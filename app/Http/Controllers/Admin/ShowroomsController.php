<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Showroom;
use App\Http\Requests\Admin\ShowroomsRequest;
class ShowroomsController extends Controller
{
    public function getList()
    {
        $db = Showroom::orderby('id','desc')->get();
        return view('admin.showrooms.index',compact('db'));
    }
    public function getAdd()
    {
        return view('admin.showrooms.add');
    }
    public function postAdd(ShowroomsRequest $r)
    {
        $db = new Showroom;
        $db->name = $r->name;
        $db->address  = $r->address;
        $db->hotline = $r->hotline;
        $db->phone = $r->phone;
        $db->embed_google_map = $r->embed_google_map;
        $imgs = $r->img_;
        $db->img = $imgs;
        $db->link = $r->link;
        $db->save();
        return redirect('admin/showroom')->with('add_success','Thêm mới thành công');
    }
    public function getEdit($id)
    {
        $item = Showroom::find($id);
        return view('admin.showrooms.edit',compact('item'));
    }
    public function postEdit(ShowroomsRequest $r,$id)
    {
        $db = Showroom::find($id);
        $db->name = $r->name;
        $db->address  = $r->address;
        $db->hotline = $r->hotline;
        $db->phone = $r->phone;
        $db->embed_google_map = $r->embed_google_map;
        $db->link_youtube = $r->link_youtube;
       
        $db->link = $r->link;
        $db->save();
        return redirect('admin/showroom')->with('edit_success','Sửa thành công');
    }
    public function del($id)
    {
        $db = Showroom::find($id)->delete();
        return redirect('admin/showroom')->with('del_success','Xóa thành công');
    }
}
