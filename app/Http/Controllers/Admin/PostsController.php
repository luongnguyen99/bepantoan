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
        $db = Post::orderby('id','desc')->get();
        return view('admin.posts.index',compact('db'));
    }
    public function getAdd()
    {
        $db = Post_category::all();
        $post_cate = Post_category::all();
        return view('admin.posts.add',compact('db','post_cate'));
    }
    public function postAdd(PostsRequest $r)
    {
        $db = new Post;
        $db->title = $r->name;
        $db->slug = $r->slug;
        $db->short_desc = $r->short_desc;
        $db->content = $r->content;
        
        $imgs = $r->img_;
        
        $db->image = $imgs;

        // echo '<pre>';
        // print_r($r->views);
        // echo '</pre>';

        // die();
        
        if($r->views){
            $db->views = $r->view;
        }else{
            $db->views = 0;
        }

        // die();

        // if(isset($r->view) && !empty($r->view) && $r->views != null){
        //     $db->views = $r->view;
        // }else{
        //     $db->views = 1;
        // }
        // $db->views = $r->view;
        
        if (!empty($r->id_cate)) {
            $db->post_category_id = $r->id_cate;
        }else{
            $db->post_category_id = null;
        }
        $db->save();
        return redirect('admin/posts')->with('add_success','Thêm thành công'); 
    }
    public function getEdit($id)
    {
        $db = Post::find($id);
        $post_cate = Post_category::all();
        
        return view('admin.posts.edit',compact(['db','post_cate']));
    }
    public function postEdit(Request $r,$id)
    {
        
        $db = Post::find($id);
        $db->title = $r->name;
        $db->slug = $r->slug;
        $db->short_desc = $r->short_desc;
        $db->content = $r->content;
        
        if (empty($r->img_)) {
            $imgs = $r->img_;
            $imgs = $db->image;
            $db->image = $imgs;
        }
        else{
            $imgs = $r->img_;
            $db->image = $imgs;
        }
        $db->views = $r->view;
        if ($r->parent_id == 0) {
            $db->post_category_id = null;
        }else{
            $db->post_category_id = $r->parent_id;
        }
        
        
        $db->save();
        return redirect('admin/posts')->with('edit_success','Sửa thành công');
    }
    public function del($id)
    {
        $db = Post::find($id)->delete();
        return redirect('admin/posts')->with('del_success','Xóa thành công');
    }
    
}
