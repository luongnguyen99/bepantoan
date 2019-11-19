<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post_category;
class Post_categoriesController extends Controller
{
   public function getAdd()
   {
        $db = Post_category::all();
       return view('admin.post_categories.add',compact('db'));
   }
   public function postAdd(Request $r)
   {
        $db = new Post_category;
        $db->parent_id = $r->parent_id;
        $db->name  = $r->name;
        $db->slug =  $r->slug;
        $db->save();
        return redirect()->back()->with('add_success','Thêm mới thành công');
   }
   public function getEdit($id)
   {
        $db = Post_category::all();
        $record_edit = Post_category::find($id);
        return view('admin.post_categories.edit',compact('db','record_edit'));
   }
   public function postEdit(Request $r,$id)
   {
        $record_edit = Post_category::find($id);
        $record_edit->parent_id = $r->parent_id;
        $record_edit->name = $r->name;
        $record_edit->slug = $r->slug;
        
        $record_edit->save();

        return redirect('admin/post_categories/add')->with('edit_success','Sửa thành công');
   }
   public function del($id)
   {
          Post_category::find($id)->delete();
          return redirect('admin/post_categories/add')->with('del_success','Xóa thành công');
   }
}
