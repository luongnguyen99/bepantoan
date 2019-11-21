<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Option;
class OptionsController extends Controller
{
    //==========> LOGO <=====================
    public function getLogo()
    {
        $db = Option::where('key','logo')->first();
        return view('admin.options.header.logo.logo',compact('db'));
    }
    public function postLogo(Request $r)
    {
        $db = Option::where('key','logo')->first();
        $db->value = $r->img[0];
        $db->save();
        return redirect()->back()->with('add_success','Thêm logo thành công');
    }
    //==========> HOTLINE <=====================
    public function getHotline()
    {
        $db = Option::where('key','hotline')->first();
        $json = json_decode($db->value,true);
        
        return view('admin.options.header.hotline.hotline',compact('json'));
    }
    public function postHotline(Request $r)
    {
        $arr = [];
        
        $arr =['phone'=>$r->phone];
       
        $json = json_encode($arr);
        $db = Option::where('key','hotline')->first();
        $db->value = $json;
        $db->save();
        return redirect()->back()->with('add_success','Thêm liên hệ thành công');
    }
    
    public function getDelHotline()
    {
        $db = Option::where('key','hotline')->first();
        $db->value = null;
        $db->save();
        return redirect('admin/options/hotline')->with('del_success','Xóa liên hệ thành công');
    }
    //==========> FOOTER <=====================
    public function getFooter()
    {
        $db = Option::where('key','footer')->first();
        $json = json_decode($db->value,true);
        
        return view('admin.options.footer.footer',compact('json'));
    }
    public function postFooter(Request $r)
    {
        $arr = [];
        
        $arr =['footer'=>$r->footer];
       
        $json = json_encode($arr);
        $db = Option::where('key','footer')->first();
        $db->value = $json;
        $db->save();
        return redirect()->back()->with('add_success','Thêm footer thành công');
    }
    public function getDelFooter()
    {
        $db = Option::where('key','footer')->first();
        $db->value = null;
        $db->save();
        return redirect('admin/options/footer')->with('del_success','Xóa footer thành công');
    }
    //==========> PAYMENT <=====================
    public function getPayment()
    {
        $db = Option::where('key','payment')->first();
        $json = json_decode($db->value,true);
        return view('admin.options.main.payment.payment',compact('json'));
    }
    public function postPayment(Request $r)
    {   
        $db = Option::where('key','payment')->first();
        if($db->value == null){
            $arr = $r->all();
            foreach($arr['table']['content'] as $row){
               $type[] = $row;
            }
            $json = json_encode($type);
            $db = Option::where('key','payment')->first();
            $db->value = $json;
            $db->save();
            return redirect()->back()->with('add_success','Thêm phương thức thành công');
        }else{
            $arr = $r->all();
            foreach($arr['table']['content'] as $row){
                $type[] = $row;
            }

            $db = Option::where('key','payment')->first();
            $json = json_decode($db->value,true);

            $merge = array_merge($json,$type);

            
            $db->value= json_encode($merge);
            $db->save();
            return redirect()->back()->with('add_success','Thêm phương thức thành công');
        }
        
    }
    public function getEditPayment($id)
    {
        $db = Option::where('key','payment')->first();
        $json = json_decode($db->value,true);
        foreach($json as $key=>$val){
            if($key == $id){
                $result = $val;
            }
        }
        
        return view('admin.options.main.payment.edit_payment',compact(['json','result']));
    }
    public function postEditPayment(Request $r,$id)
    {
        
        $db = Option::where('key','payment')->first();
        $json = json_decode($db->value,true);
        foreach($json as $key=>$val){
            if($key == $id){
                $val['type'] = $r->type;
            }
            $result[] = $val;
        }
        $json1 = json_encode($result);
        $db->value = $json1; 
        $db->save();
        return redirect('admin/options/payment')->with('edit_success','Sửa thành công');
    }
    public function getDelPayment($id)
    {
        $db = Option::where('key','payment')->first();
        $json = json_decode($db->value,true);
        foreach($json as $key=>$val){
            if($key == $id){
                unset($json[$key]);
            }
        }
        $db->value = json_encode($json);
        $db->save();
        return redirect('admin/options/payment')->with('del_success','Xóa thành công');
    }
    //==========> SOCIAL NETWORK <=====================
    public function getSocial_network()
    {
        $db = Option::where('key','social_network')->first();
        $json = json_decode($db->value,true);
        return view('admin.options.main.social_network.social_network',compact('json'));
    }
    public function postSocial_network(Request $r)
    {   
        $db = Option::where('key','social_network')->first();
        if($db->value == null){
            $arr = $r->all();
            foreach($arr['table']['content'] as $row){
               $type[] = $row;
            }
            $json = json_encode($type);
            $db = Option::where('key','social_network')->first();
            $db->value = $json;
            $db->save();
            return redirect()->back()->with('add_success','Thêm phương thức thành công');
        }else{
            $arr = $r->all();
            foreach($arr['table']['content'] as $row){
                $type[] = $row;
            }

            $db = Option::where('key','social_network')->first();
            $json = json_decode($db->value,true);

            $merge = array_merge($json,$type);

            
            $db->value= json_encode($merge);
            $db->save();
            return redirect()->back()->with('add_success','Thêm phương thức thành công');
        }
        
    }
    public function getEditSocial_network($id)
    {
        $db = Option::where('key','social_network')->first();
        $json = json_decode($db->value,true);
        foreach($json as $key=>$val){
            if($key == $id){
                $result = $val;
            }
        }
        return view('admin.options.main.social_network.edit_social_network',compact(['json','result']));
    }
    public function postEditSocial_network(Request $r,$id)
    {
        
        $db = Option::where('key','social_network')->first();
        $json = json_decode($db->value,true);
        foreach($json as $key=>$val){
            if($key == $id){
                $val['type'] = $r->type;
            }
            $result[] = $val;
        }
        $json1 = json_encode($result);
        
        $db->value = $json1; 
        
        $db->save();
        return redirect('admin/options/social_network')->with('edit_success','Sửa thành công');
    }
    public function getDelSocial_network($id)
    {
        $db = Option::where('key','social_network')->first();
        $json = json_decode($db->value,true);
        foreach($json as $key=>$val){
            if($key == $id){
                unset($json[$key]);
            }
        }
        $db->value = json_encode($json);
        $db->save();
        return redirect('admin/options/social_network/')->with('del_success','Xóa thành công');
    }
    
    //  ==================== General setting ====================== //

    public function getGeneral(){
        $name_site = Option::where('key','general_name_site')->first();
        $desc_site = Option::where('key','general_description_site')->first();
        $header_code = Option::where('key','general_header_code')->first();
        $footer_code = Option::where('key','general_footer_code')->first();
        $data  = array( 'name_site' => $name_site->value , 'desc_site'=>$desc_site->value ,'header_code'=>$header_code->value ,'footer_code'=> $footer_code->value  );
        return view('admin.options.general.view',compact(['data']));
    }

    public function updateGeneral( Request $request ){
        $data_arr = $request->input();
        if(isset($data_arr) && !empty($data_arr)){
            foreach ($data_arr as $key => $value) {
                if($key != "_token"){
                    $db = Option::where('key',$key)->first();
                    $db->value = $request->input($key);
                    $db->save();    
                }  
            }
        }
        $request->session()->flash('alert-success', 'Cập nhật thành công!');
        return redirect()->back()->with('add_success','Cập nhật thành công!');

    }
}
