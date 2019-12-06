<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Page,Post,Post_category};

class PageController extends Controller
{
    public function getList()
    {   
        $db = Page::all();
        return view('admin.page.index',compact('db'));
    }
    public function getAdd()
    {
        $db = Page::all();
        $post_cate = Page::all();
        return view('admin.page.add',compact('db'));
    }
    public function postAdd(Request $r)
    {
        $r->validate([
            'name'=>'required',
            'slug'=>'required',
        ],
        [
            'name.required'=>'Tiêu đề không được bỏ trống',
            'slug.required'=>'Đường dẫn không được bỏ trống',
        ]);
        $db = new Page;
        $db->title = $r->name;
        $db->slug = $r->slug;
        $db->content = $r->content;
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
        return redirect('admin/page')->with('add_success','Thêm thành công'); 
    }
    public function getEdit($id)
    {
        $db = Page::find($id);
       
        return view('admin.page.edit',compact(['db']));
    }
    public function postEdit(Request $r,$id)
    {
        $db = Page::find($id);
       
        $db->title = $r->name;
        $db->slug = $r->slug;
        $db->content = $r->content;
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
        return redirect('admin/page')->with('edit_success','Sửa thành công');
    }
    public function del($id)
    {
        $db = Post::find($id)->delete();
        return redirect('admin/page')->with('del_success','Xóa thành công');
    }
}
