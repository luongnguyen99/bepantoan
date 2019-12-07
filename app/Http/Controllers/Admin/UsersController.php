<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\EditUserRequest;
use Auth;
class UsersController extends Controller
{
    //
    public function getuser(){
        $data['user']=User::all();
        return view('admin.users.listuser',$data);
    }
    public function getadd(){
        $data['per'] = User::all();
        
        return view('admin.users.add',$data);
    }
    public function postadd(UserRequest $r){
        $users = new User;
        $users->name = $r->name;
        $users->email = $r->email;
        $users->role = $r->input('level');
        $users->password = bcrypt($r->password);
        $users->save();
        return redirect('admin/users')->with('thongbao','Đã Thêm Thành Công');
    }
    public function getedit($id){
        $data['user']=User::find($id);
        //$data['json'] = json_decode($data['user']->role,true);
        return view('admin.users.edit',$data);
    }
    public function postedit(EditUserRequest $r,$id){

        $users = User::find($id);
       
        $users->name = $r->name;
        $users->email = $r->email;
        $users->role = $r->input('level');
        if (!empty($users->password)) {
            $users->password = bcrypt($r->password);
        }
        $users->save();
        return redirect('admin/users')->with('thongbao','Đã Sửa Thành Công');
    }
    public function getdel($id){
        User::find($id)->delete();
        return redirect('admin/users')->with('thongbao','Đã Xóa Thành Công');
    }

}
