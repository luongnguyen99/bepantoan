<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\Option;
if (!function_exists('activeNav')) {
    function activeNav($segment_2 = '', $segment_3 = '')
    {
        if ($segment_2 == '' && Request::segment(2) == $segment_2 && Request::segment(3) == $segment_2 && $segment_2 == $segment_3) {
            return 'active';
        } else {
            if (Request::segment(2) === $segment_2) {
                if (empty($segment_3)) {
                    return 'active';
                } else {
                    if (in_array(Request::segment(3), ['list', 'index', '', null]) && in_array($segment_3, ['list', 'index', '', null])) {
                        return 'active';
                    } elseif (Request::segment(3) == $segment_3) {
                        return 'active';
                    } else {
                        return '';
                    }
                }
            }
        }
    }
}

if (!function_exists('to_slug')) {
    function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
if (!function_exists('get_detail_products_by_id')) {
    function get_detail_products_by_id($id)
    {
        $products = Product::where('id', $id)->with('galleries', 'brand')->first();
        return $products;
    };
}

// get product
if (!function_exists('get_products_by_category_id')) {
    function get_products_by_category_id($id){
        $products = Product::where('category_id',$id)->orderBy('created_at','desc')->with('galleries','brand')->limit(5)->get();
        return $products;
    };
}

// number format 
if (!function_exists('pveser_numberformat')) {
    function pveser_numberformat($price){
        $price =  number_format($price, 0, '', '.').'đ';
        return $price;
    }
}
// get category
if (!function_exists('get_product_by_id')) {
    function get_product_by_id($id)
    {
        $category = Category::where('id',$id)->first();
        return $category;
    }
}
//==============>Validate Input<=====================
function showError($errors, $nameInput)
{
    if ($errors->has($nameInput)) {
        echo '<div class="alert alert-danger" style="opacity:0.5">';
        echo '<strong>'.$errors->first($nameInput).'</strong>';
        echo '</div>';
    }
}
//==============>Get Category<=====================
function GetCategory($category, $parent, $shift, $id_select)
{
    foreach ($category as $value) {
        if ($value['parent_id'] == $parent) {
            if ($value['id'] == $id_select) {
                echo '<option value='.$value['id'].' selected>'.$shift.$value['name'].'</option>';
            } else {
                echo '<option value='.$value['id'].'>'.$shift.$value['name'].'</option>';
            }

            GetCategory($category, $value['id'], $shift.'----|', $id_select);
        }
    }
}
//==============>Show Category<=====================
function ShowCategory($category, $parent, $shift)
{   
    foreach ($category as $value) {
        if ($value['parent_id'] == $parent) {
            echo '
        <tr>
            <td>'.$shift.$value['name'].'</td>
                <td>
                <a href="/admin/post_categories/edit/'.$value['id'].'" class="btn btn-warning" >Edit</a>
                <a href="/admin/post_categories/del/'.$value['id'].'" class="btn btn-danger" role="button">Del</a>
                </td>
            </td>
        </tr>';
            ShowCategory($category, $value['id'], $shift.'----|');
        }
    }
}
//=================>Cut Content<======================
function get_excerpt($content, $number)
{
    
    $excerpt = $content;
    
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    
    $excerpt = strip_tags($excerpt);
    
    $excerpt = substr($excerpt, 0, $number);
    
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt."...";
}

// =================> Get option <================= //
function get_option_by_key($key){
    try {
        $option = Option::where('key',$key)->first();
        return $option->value;
    } catch (Throwable $th) {
        return false;
    }

}

// ================> Build Tree category <=================== //

function make_tree($dataArr , $id = 0 ) {
    $map_data = array();
    foreach($dataArr as $key => $data){
        //  break if parent == 0
        // echo '<li class="ng-scope  drop-icon re-icon">';
        if($data['parent'] == $id){
            
            unset($dataArr[$key]);
            $map_data[] = $data;
            $child = make_tree($map_data , $data['id']);

            $map_data = array_merge( $map_data , $child );

        }

        // echo '</li>';


    }

    return $map_data;

}


function list_tree( $dataArr , $parent = 0){
    $result_data = array();
    foreach ($dataArr as $key => $value) {
        
        // if($value['id'] = $id){

            $check_last = check_last_child( $dataArr , $value['id']);

            if( $check_last ){
                //  is last child
                if($value['parent'] != 0){
                    echo '  <li class="ng-scope ng-has-child'. $value['id'] .'"><a href="#">'. $value['name'] .'</a> </li>';
                    break;
                }else{
                    ?>
                        <li class="ng-scope  drop-icon re-icon">
                            <a href="#"><span>
                                <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>"></span><?php echo  $value['name']?>
                            </a>
                        </li>
                    <?php
                    
    
                }

                unset( $dataArr[$key] );
    
                
    
            }else{
                //  find child
                ?>
                    <li class="ng-scope  drop-icon re-icon menu-item-has-children">
                        <a href="#"><span>
                            <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>"></span><?php echo  $value['name']?>
                        </a>
                        <ul class="sub-menu">
    
                            <?php 
                                // list_tree( $dataArr , $value['id'] ); 
                            ?>
    
    
                        </ul>
    
                    </li>
                <?php
    
    
    
            }


        // }else{
        //     break;
        // }






    }
    
}


function find_parent( $dataArr , $id ){
    $result = array();
    foreach ($dataArr as $key => $value) {
        if( $value['parent'] == $id ){
            $result[] = $value;
        }
    }

    return $result;

}

function list_tree_2( $dataArr , $id ){

    foreach ($dataArr as $key => $value) {  
        
        if( $value['id'] == $id ){

            if($value['parent'] != 0){
                echo '  <li class="ng-scope ng-has-child'. $value['id'] .'"><a href="#">'. $value['name'] .'</a> </li>';
            }else{
                ?>
                    <li class="ng-scope  drop-icon re-icon">
                        <a href="#"><span>
                            <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>"></span><?php echo  $value['name']?>
                        </a>
                    </li>
                <?php
            }
        }

    }
    
}



function show_main_cate( $dataArr ){
    foreach ($dataArr as $value) {
        
        if( check_last_child(  $dataArr , $value['id'] ) && $value['parent'] == 0 ){


            ?>
                <li class="ng-scope  drop-icon re-icon">
                    <a href="#"><span>
                        <img src="<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>"></span><?php echo  $value['name']?>
                    </a>
                </li>
            <?php



        }else{

            $parentArr = find_parent( $dataArr , $value['id']);
            // echo '<pre>';
            // print_r("================");
            // echo '</pre>';

            // // echo '<pre>';
            // // print_r($value[]);
            // // echo '</pre>';
            // echo '<pre>';
            // print_r($parentArr);
            // echo '</pre>';

        }

    }


}

function check_last_child($dataArr , $id){
    $check = true;
    foreach ($dataArr as $key => $value) {
        
        if( $value['parent'] == $id  ){
            $check = false;

            break;
        }
    }
    return $check;
}







function build_categories_tree(){
    try {
        
        $categories = Category::all();
        $dataArr = array();
        foreach ($categories as $key => $value) {
            $dataArr[] = array(
                'id' => $value->id,
                'name' => $value->name,
                'image' => $value->image,
                'parent' => $value->parent_id,
            );
        }

        
        // test check last child 

    
        show_main_cate($dataArr);

        $parents = make_tree($dataArr , 0);

        if(isset($dataArr) && !empty($dataArr)){
           
            // // foreach ($dataArr as $item) {
               
            //     list_tree_2( $dataArr , 0); 

            // // }

            
            

        }else{
            return false;
        }





    } catch (\Throwable $th) {
        return false;
    }
    


}


// make header category  product

function show_heder_list_cate(){
    try {
        $all_cate = Category::where('parent_id',0)->get()->toarray();
        if(isset($all_cate) && !empty($all_cate)){
            return $all_cate;
        }else{
            return flase;
        }
    } catch (\Throwable $th) {
        return false;
    }
}

// ============> GET CATEGORY PRODUCT NAME <===========
function get_product_category_url( $slug_product , $slug_brand ){

    // return route(  );

}



