<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Post,Category,Post_category,Option};
class BlogController extends Controller
{
    public function getData($slug)
    {
    
        $cate = Category::all();
        $post_cate = Post_category::all();
        $new_post = Post::orderby('id','desc')->take(5)->get();
        $highlights_post = Post::orderby('views','desc')->take(5)->get();
        if ($slug == 'tin-tuc') {
            //Slug == Slug tin-tuc
            $db = Post::paginate(6);
            $title = 'Tin tức';
            return view('Client.blog',compact('db','cate','post_cate','new_post','highlights_post','title'));
        }
        else{
            foreach ($post_cate as $value) {
                //Slug == Slug category
                if ($value->slug == $slug) {
                    $db = Post_category::join('posts','posts.post_category_id','=','Post_categories.id')
                    ->where('Post_categories.slug',$slug)->whereOr('posts.slug',$slug)
                    ->select('posts.id','posts.title','posts.slug','posts.short_desc','posts.content','posts.image','posts.views','posts.post_category_id','posts.created_at')->paginate(6);
                    $title = $value->name;
                    return view('Client.blog',compact('db','cate','post_cate','new_post','highlights_post','title'));
                }
                else{
                    //Slug == Slug product
                    $db_detail = Post::where('slug',$slug)->first();
                    if($db_detail){
                        $id_cate =$db_detail->post_category_id;
                        $post_other = Post::where('post_category_id',$id_cate)->join('Post_categories','Post_categories.id','=','Posts.post_category_id')
                        ->select('posts.id','posts.title','posts.slug','posts.short_desc','posts.content','posts.image','posts.views','posts.post_category_id','posts.created_at')
                        ->take(10)->get();
                        $title = $db_detail->title;
                        $db_detail->views++;
                        $db_detail->save();
                        return view('Client.blog',compact('db_detail','cate','post_cate','new_post','highlights_post','post_other','title'));
                    }
                }
            }
        }
    }
    public function Introduce()
    {
        $introduce_m = Option::where('key', '=', 'introduce')->first();
        $introduce = json_decode($introduce_m->value,true);
        $title = 'Giới thiệu';
        return view('Client.introduce',compact('title','introduce'));
    }
}