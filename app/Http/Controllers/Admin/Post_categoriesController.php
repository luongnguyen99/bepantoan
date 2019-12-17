<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post_category;
use Validator;
class Post_categoriesController extends Controller
{
   public function getAdd()
   {
        $db = Post_category::all();
       return view('admin.post_categories.add',compact('db'));
   }
   public function postAdd(Request $r)
   {
          $validator = Validator::make(
             $r->all(),
             [
                  'name' => 'required',
                  'slug' => 'required|unique:post_categories,slug',
             ],
             [
                  'name.required' => 'Tên không được để trống',
                  'slug.required' => 'Đường dẫn không được để trống',
                  'slug.unique' => 'Đường dẫn đã tồn tại điền đường dẫn khác',
             ]
          );
          if($validator->fails()){
               return redirect()->back()->withErrors($validator->errors())->withInput();
          }else{
               $db = new Post_category;
               $db->name  = $r->name;
               $db->slug =  $r->slug;
               if ($r->add_seo == 'on') {
                    $db->seo_title = $r->seo_title;
                    $db->seo_keyword = $r->seo_keyword;
                    $db->seo_description = $r->seo_description;
                    if ($r->block_robot_google == 'on' && !empty($r->block_robot_google)) {
                         $db->block_robot_google = 1;
                    }else{
                         $db->block_robot_google = -1;
                    }
               };

               $db->save();
               return redirect()->back()->with('add_success','Thêm mới thành công');
          }
          
   }
   public function getEdit($id)
   {
        $db = Post_category::all();
        $record_edit = Post_category::find($id);
        return view('admin.post_categories.edit',compact('db','record_edit'));
   }
   public function postEdit(Request $r,$id)
   {
          $validator = Validator::make(
               $r->all(),
               [
                    'name' => 'required',
                    'slug' => 'required|unique:post_categories,slug,'.$id,
               ],
               [
                    'name.required' => 'Tên không được để trống',
                    'slug.required' => 'Đường dẫn không được để trống',
                    'slug.unique' => 'Đường dẫn đã tồn tại điền đường dẫn khác',
               ]
          );
          if($validator->fails()){
               return redirect()->back()->withErrors($validator->errors())->withInput();
          }else{
               $record_edit = Post_category::find($id);
               $record_edit->name  = $r->name;
               $record_edit->slug =  $r->slug;
               if ($r->add_seo == 'on') {
                    $record_edit->seo_title = $r->seo_title;
                    $record_edit->seo_keyword = $r->seo_keyword;
                    $record_edit->seo_description = $r->seo_description;
                    if ($r->block_robot_google == 'on' && !empty($r->block_robot_google)) {
                         $record_edit->block_robot_google = 1;
                    }else{
                         $record_edit->block_robot_google = -1;
                    }
               };
               
               $record_edit->save();

               return redirect('admin/post_categories/add')->with('edit_success','Sửa thành công');
          }
   }
   public function del($id)
   {
          Post_category::find($id)->delete();
          return redirect('admin/post_categories/add')->with('del_success','Xóa thành công');
   }
}
