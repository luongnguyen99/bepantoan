<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Post,Post_category};
use App\Http\Requests\Admin\PostsRequest;
class PostsController extends Controller
{
    public function getList()
    {   
        $db = Post::all();
        return view('admin.posts.index',compact('db'));
    }
    public function getAdd()
    {
        $db = Post_category::all();
        return view('admin.posts.add',compact('db'));
    }
    public function postAdd(PostsRequest $r)
    {
        $db = new Post;
        $db->title = $r->name;
        $db->slug = $r->slug;
        $db->short_desc = $r->short_desc;
        $db->content = $r->content;

        $imgs = $r->img;
        $db->image = $imgs[0];

        $db->views = $r->view;
        
        $db->post_category_id = $r->parent_id;
        
        $db->save();
        return redirect('admin/posts')->with('add_success','Thêm thành công'); 
    }
    public function getEdit($id)
    {
        $db = Post::find($id);
        $post_cate = Post_category::all();
        return view('admin.posts.edit',compact(['db','post_cate']));
    }
    public function postEdit(PostsRequest $r,$id)
    {
        
        $db = Post::find($id);
        $db->title = $r->name;
        $db->slug = $r->slug;
        $db->short_desc = $r->short_desc;
        $db->content = $r->content;
        $imgs = $r->img;
        $db->image = $imgs[0];
        
        $db->views = $r->view;
        $db->post_category_id = $r->parent_id;
        $db->save();
        return redirect('admin/posts')->with('edit_success','Sửa thành công');
    }
    public function del($id)
    {
        $db = Post::find($id)->delete();
        return redirect('admin/posts')->with('del_success','Xóa thành công');
    }
}
