<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $r->validate([
            'phone' => 'required'
        ],
        [
            'phone.required' => 'Không được bỏ trống'
        ]);
        $arr = [];
        $request['phone'] = $r->phone;
        if (!empty($r->content)) {
            $request['content'] = $r->content;
        }else{
            $request['content'] = null;
        }
       
        $db = Option::where('key','hotline')->first();
        $db->value = json_encode($request);
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
    public function getCopyright()
    {
        $db = Option::where('key','footer')->first();
        $json = json_decode($db->value,true);
        
        return view('admin.options.footer.footer-copy',compact('json'));
    }
    public function postCopyright(Request $r)
    {
        $arr = [];
        
        $arr =['footer'=>$r->footer];
       
        $json = json_encode($arr);
        $db = Option::where('key','footer_copy')->first();
        $db->value = $json;
        $db->save();
        return redirect()->back()->with('add_success','Thêm Copyright thành công');
    }
    public function getDelCopyright()
    {
        $db = Option::where('key','footer_copy')->first();
        $db->value = null;
        $db->save();
        return redirect()->back()->with('del_success','Xóa Copyright thành công');
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
    public function getPrdDetail()
    {
        $sale_m = Option::where('key', '=', 'sale')->first();
        $sale = $sale_m->value;

        $switchboard_m = Option::where('key', '=', 'switchboard')->first();
        $switchboard = $switchboard_m->value;

        $sidebar_m = Option::where('key', '=', 'sidebar')->first();
        $sidebar = json_decode($sidebar_m->value,true);

        $payment_m = Option::where('key', '=', 'method_payment')->first();
        $payment = $payment_m->value;
        return view('admin.options.main.product_detail.index',compact('sale','switchboard','sidebar','payment'));
    }
    public function postSale(Request $r)
    {
        $r->validate([
            'sale'=>'required',
        ],
        [
            'sale.required'=>'Nội dung không được bỏ trống'
        ]);
        $sale = Option::where('key', '=', 'sale')->first();
        $sale->value = $r->sale;
        $sale->save();
        return redirect()->back()->with('sale_access');
    }
    public function getDelSale()
    {
        $sale = Option::where('key', '=', 'sale')->first();
        $sale->value = null;
        $sale->save();
        return redirect()->back()->with('sale_danger');
    }
    public function postSwitchboard(Request $r)
    {
        $r->validate([
            'phone'=>'required',
            'content_switchboard' => 'required'
        ],
        [
            'phone.required'=>'Không được bỏ trống',
            'content_switchboard.required'=>'Nội dung không được bỏ trống'
        ]);
        $switchboard = Option::where('key', '=', 'switchboard')->first();
        $request['phone'] = $r->phone;
        $request['content'] = $r->content_switchboard;
        
        $switchboard->value = json_encode($request);
        $switchboard->save();
        return redirect()->back()->with('switchboard_success');
    }
    public function getDelSwitchboard()
    {
        $switchboard = Option::where('key', '=', 'switchboard')->first();
        $switchboard->value = null;
        $switchboard->save();
        return redirect()->back()->with('switchboard_danger');
    }
    public function postSidebar(Request $r)
    {
    	
        $sidebar = Option::where('key', '=', 'sidebar')->first();
        $arr = $r->all();
        $data_old = [];
        $data_new = [];
        if(!empty($arr['text']) || !empty($arr['icon'])){
            foreach ($arr['text'] as $key=>$text) {
                foreach ($arr['icon'] as $k=>$icon) {
                    $data_new[$key]['text'] = $text;
                    $data_new[$k]['icon'] = $icon;
                }
            }
            
            if(!empty($arr['table']['content'])){
                $merge_arr =  array_merge($data_new,$arr['table']['content']);
                $sidebar->value = json_encode($merge_arr);
                $sidebar->save();
                return redirect()->back()->with('sidebar_success');
            }
            else{
                $sidebar->value = json_encode($data_new);
                $sidebar->save();
                return redirect()->back()->with('sidebar_success');
            }
            
        }else{
        	
            if(!empty($arr['table']['content'])){
                $sidebar->value = json_encode($arr['table']['content']);
                $sidebar->save();
                return redirect()->back()->with('sidebar_success');
            }
            else{
                $sidebar->value = null;
                $sidebar->save();
                return redirect()->back()->with('sidebar_success');
            }
        }
    }
    public function postMethodPayment(Request $r)
    {
        $payment = Option::where('key', '=', 'method_payment')->first();
        $payment->value = $r->content;
        $payment->save();
        return redirect()->back()->with('payment_success');
    }
    public function getFooter()
    {
        $footer_m = Option::where('key', '=', 'footer')->first();
        $footer = json_decode($footer_m->value,true);
        
        return view('admin.options.footer.footer',compact('footer'));
    }
    public function postFooter(Request $r)
    {
        $block['block1'] = $r->block1;
        $block['block2'] = $r->block2;
        $block['block3'] = $r->block3;
        $block['block4'] = $r->block4;

        $footer = Option::where('key', '=', 'footer')->first();
        $footer->value = json_encode($block);
        $footer->save();
        return redirect()->back()->with('footer_success');
    }
    public function getIntroduce()
    {
        $introduce_m = Option::where('key', '=', 'introduce')->first();
        $introduce = json_decode($introduce_m->value,true);
        
        return view('admin.options.main.introduce.index',compact('introduce'));
    }
    public function postIntroduce(Request $r)
    {
        $r->validate([
            'banner'=>'required',
            'title_banner'=>'required',
            'img_introduce'=>'required',
            'content'=>'required',
        ],
        [
            'banner.required'=>'Banner không được bỏ trống',
            'title_banner.required'=>'Tiêu dề banner không được bỏ trống',
            'img_introduce.required'=>'Ảnh nội dung không được bỏ trống',
            'content.required'=>'Nội dung không được bỏ trống'
        ]);
        $introduce = Option::where('key', '=', 'introduce')->first();
        $req['banner'] = $r->banner;
        $req['title_banner'] = $r->title_banner;
        $req['img_introduce'] = $r->img_introduce;
        $req['content'] = $r->content;
        $req['title_rep'] = $r->title_rep;
        
        if(empty($r->content2_old)){
            $req['table'] = $r->table;
        }else{
            foreach ($r->content2_old as $key => $value) {
                $arr_old[$key]['content2'] = $value;
            }
            if (!empty($r->table['content'])) {
                $arr_new = array_merge($arr_old,$r->table['content']);
                $req['table']['content'] = $arr_new; 
            }else{
                $req['table']['content'] = $arr_old;
            }
            
        }
       
        $introduce->value = json_encode($req);
        $introduce->save();
        return redirect()->back()->with('success');
    }

    public function choose_category_show_home(Request $request){
        if ($request->isMethod('post')) {
            $arr = json_decode($request->categories,true);
            $new_arr = array_column($arr,'id');
            Option::where('key','=','categories_show_home')->update(['value' => json_encode($new_arr)]);
            return response([
                'errors' => false,
            ]);
        };
        $categories = Category::all();
        return view('admin.options.home.choose_category_show_home',compact('categories'));
    }

    public function email_admin(Request $request){
        if ($request->isMethod('post')) {
            Option::where('key', '=', 'email_admin')->update(['value' => $request->email]);
            return redirect()->back()->with('success', 'Cập nhập email thành công');
        };
        return view('admin.options.main.email_admin');
    }

    public function seo_setting(Request $request){
        if ($request->isMethod('post')) {
            Option::where('key', '=', 'seo_title_home')->update(['value' => $request->seo_title_home]);
            Option::where('key', '=', 'seo_description_home')->update(['value' => $request->seo_description_home]);
            Option::where('key', '=', 'seo_keyword_home')->update(['value' => $request->seo_keyword_home]);
            if (!empty($request->block_robot_google_home) && $request->block_robot_google_home == 'on') {
                Option::where('key', '=', 'block_robot_google_home')->update(['value' => 1]);
            }else{
                Option::where('key', '=', 'block_robot_google_home')->update(['value' => 0]);
            }

            if (!empty($request->block_robot_google) && $request->block_robot_google == 'on') {
                Option::where('key', '=', 'block_robot_google')->update(['value' => 1]);
            }else{
                Option::where('key', '=', 'block_robot_google')->update(['value' => 0]);
            }
            return redirect()->back()->with('success', 'Cập nhập thành công');
        }
        return view('admin.options.seo_setting');
    }
}
