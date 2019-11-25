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
    public function delLogo()
    {
        $db = Option::where('key','logo')->first();
        $db->value = null;
        $db->save();
        return redirect()->back()->with('add_success','Xóa logo thành công');
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
    //==========> SLIDE <=====================
    public function getSlide()
    {
        $slide = Option::where('key','slide')->first();
        if($slide->value != null){
            $db = json_decode($slide->value,true);
        }else{
            $db = null;
        }
        return view('admin.options.main.slide.add',compact('db'));
    }
    public function postSlide(Request $r)
    {
        $r->validate([
            'img_' =>'required',
        ],
        [
            'img_.required'=>'Không được để trống ảnh slide',
        ]);

        $arr = $r->all();
        
        $count_arr = count($arr['table']['content']);
        if ($arr['table'] != null) {
            foreach($arr['table'] as $row){
                
                if (isset($arr['img_'])) {
                    if($row[$count_arr-1]){
                        $row[$count_arr-1]['img_'] = $arr['img_'];
                    }else{
                        $row[$count_arr-1]['img_'] = null;
                    }
                }
                $result[] = $row;
            }
        }
        $db = Option::where('key','slide')->first();
        if($db->value == null){
            $db->value = json_encode($result);
            $db->save();
            return redirect()->back()->with('add_success');
        }
        else{
            $arr = json_decode($db->value,true);
            $merge[0] =  array_merge($arr[0],$result[0]);
            $db->value = json_encode($merge);
            $db->save();
            return redirect()->back()->with('add_success','Thêm slide thành công');
        }
    }
    public function getEditSlide($id)
    {
        $slide = Option::where('key','slide')->first();
        
        if($slide->value != null){
            $db = json_decode($slide->value,true);
            foreach($db[0] as  $key=>$val){
                if($id == $key){
                    $db_edit =$val;
                }
            }
        }else{
            $db = null;
        }
        return view('admin.options.main.slide.edit',compact('db_edit','db'));
    }
    public function postEditSlide(Request $r,$id)
    {
        $slide = Option::where('key','slide')->first();
        $arr = $r->all();
        $count_arr = count($arr['table']['content']);
        
        foreach ($arr as $value_arr) {
            
            if (isset($arr['img_']) || isset($arr['table']['content'][0]['type'])) {
                if ($arr['table'] != null) {
                    foreach($arr['table'] as $row){
                        
                        if (isset($arr['img_']) || isset($arr['table']['content'][0]['type'])) {
                            if(isset($arr['img_'])){
                                if($row[$count_arr-1]){
                                    $row[$count_arr-1]['img_'] = $arr['img_'];
                                }else{
                                    $row[$count_arr-1]['img_'] = null;
                                }
                            }
                            else{
                                $row[$count_arr-1]['img_'] = $row[$count_arr-1]['old_img'];
                                
                            }
                        }
                        $result[] = $row;
                        unset($result[0][0]['old_img']);
                        $all_slide = json_decode($slide->value,true);
                        foreach ($all_slide as $value) {
                            foreach($all_slide[0] as $key=>$row){
                                $id_int = (int) $id;
                                
                                if ($key == $id_int) {
                                   
                                    $value[$key] = $result[0][0];
                                    
                                    $row1[0] = $value;
                                    
                                    $slide->value = json_encode($row1);
                                    
                                    $slide->save();
                                    return redirect('admin/options/slide/')->with('edit_success','Sửa thành công');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    public function DelSlide(Request $r,$id)
    {
        $slide = Option::where('key','slide')->first();
        $arr = $r->all();
        $slide_json = json_decode($slide->value,true);
        foreach ($slide_json as $value) {
           foreach ($slide_json[0] as $key => $row) {
            $id_int = (int) $id;
               if($key == $id_int){
                   $ninh = $slide_json[0][$key];
                   unset($slide_json[0][$key]); 
                   $slide->value = json_encode($slide_json);
                   $slide->save();
                   return redirect('admin/options/slide/')->with('del_success','Xóa thành công');
               }
           }
        }
    }
    //==========> MENU <=====================
    public function getMenu()
    {
        $options = Option::where('key', '=', 'menu')->first();
        
        if (!empty($options->value)) {
            $json = json_decode($options->value);
            
            $showMenu = $this->show_menu($json);
           
        } else {
            $showMenu = '';
        }
        return view('admin.options.header.menu.add', compact('showMenu'));
    }
    public function show_menu($arr_menu, $result = '')
    {
        if ($arr_menu) {
            $result .= '<ol class="dd-list">';
            foreach ($arr_menu as $key => $item) {
                $item = get_object_vars($item);
                $name = $item['name'];
                $link = $item['link'];
                $icon = $item['icon'];
                $clss= $item['clss'];
                
                $result .= '<li class="dd-item" data-link="' . $link . '" data-name="' . $name . '" 
                data-icon="' . $icon . '" data-clss="' . $clss . '">';
                $result .= '<div class="dd-handle" style="padding:6px 150px;">' . $name . '</div>';
                if (array_key_exists("children", $item)) {
                    $result = $this->show_menu($item["children"], $result);
                }
                $result .= '<div class="menu-actions"><a href="#modal-menu" class="edit-menu modal-with-form"><i class="fa fa-edit"></i></a><a href="#" class="remove-menu"><i id="rmv-menu" class="fa fa-times"></i></a></div></li>';
            }
            $result .= '</ol>';
        }
        return $result;
    }
    public function postMenu(Request $r)
    {
        $options = Option::where('key', '=', 'menu')->first();

        $opt_value = json_decode($options->value);

        $new_item = array(
            "name" => $r->menu_name,
            "link" => $r->menu_link,
            "icon" => $r->menu_icon,
            "clss"=> $r->menu_class
        );
        $new_item = (object) $new_item;
        
        $opt_value[] = $new_item;
        $options->value = json_encode($opt_value);
        $options->save();
        $the_newoption = Option::where('key', '=', 'menu')->first();
        return redirect()->back()->with('add-menu-success', 'Thêm menu thành công!');
    }
    public function postUpdateMenu(Request $r)
    {
        // menu_content
        $options = Option::where('key', '=', 'menu')->first();
        $options->value = $r->menu_content;
        $options->save();
        return redirect()->back()->with('update-menu-success', 'Thêm menu thành công!');
    }

    //==========> MENU Phone <==================
    public function getMenuPhone()
    {
        $options = Option::where('key', '=', 'menu_phone')->first();
        
        if (!empty($options->value)) {
            $json = json_decode($options->value);
            $showMenu = $this->show_menu($json);
        } else {
            $showMenu = '';
        }

        return view('admin.options.header.menu.menu-phone', compact('showMenu'));
    }
    public function postMenuPhone(Request $r)
    {
        $options = Option::where('key', '=', 'menu_phone')->first();
        
        $opt_value = json_decode($options->value);

        $new_item = array(
            "name" => $r->menu_name,
            "link" => $r->menu_link,
            "icon" => $r->menu_icon,
            "clss"=> $r->menu_class
        );
            
        $new_item = (object) $new_item;
        $opt_value[] = $new_item;
        $options->value = json_encode($opt_value);
        $options->save();
        return redirect()->back()->with('add-menu-success', 'Thêm menu thành công!');
    }
    public function postUpdateMenuPhone(Request $r)
    {
        // menu_content
        $options = Option::where('key', '=', 'menu_phone')->first();
        $options->value = $r->menu_content;
        $options->save();
        return redirect()->back()->with('update-menu-success', 'Thêm menu thành công!');
    }
}
