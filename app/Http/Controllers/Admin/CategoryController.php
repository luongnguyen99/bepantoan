<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Category;
use Validator;
use App\Models\Property;
use App\Models\Categories_properties;
class CategoryController extends Controller
{
    public function searchCategory(Request $request){
        $categories = Category::where('name' , 'LIKE' , '%'.$request->search.'%')->get();
        return $categories;
    }

    public function getData(){
        $categories = Category::select()->orderBy('id', 'desc')->with('properties')->get();
        $categoriesRecursive = $this->categoriesRecursive($categories);
        return Datatables::of($categoriesRecursive)->make();
    }

    public function index(){
        
        $categories = Category::all();
        $properties = Property::all();
        return view('admin.categories.index',compact('categories','properties'));
    }

    public function categoriesRecursive($categories, $parent_id = 0, $step = 0)
    {
        foreach ($categories as $key => $item) {
            if ( $item['parent_id'] == $parent_id) {
                $c = $item;
                $category = Category::find($item['parent_id']);
                $c['step'] = $step;
                $c['parent_name'] = $category['name'];
                $this->_data['categories'][] = $c;
                unset($categories[$key]);
                $this->categoriesRecursive($categories,  $item['id'], $step + 1);
            }
        }

        return $this->_data['categories'];
    }

    public function saveAdd(Request $request){
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:categories,name',
                'slug' => 'required|unique:categories,slug',
            ],
            [
                'name.required' => 'Tên danh mục không được để trống.',
                'name.unique' => 'Tên danh mục đã tồn tại,chọn tên khác.',
                'slug.required' => 'Đường dẫn không được để trống.',
                'slug.unique' => 'Đường dẫn đã tồn tại,chọn tên khác.',
            ]
        );

        if ($validator->fails()) {
            return response(
                [
                    'err' => true,
                    'messages' => $validator->errors(),
                    
                ], 200);
        }else{
            $name_category = str_replace(',','-',$request->name); 
            $data = [
                'name' => $name_category,
                'slug' => to_slug($request->slug),
                'parent_id' => $request->parent_id,
            ];
            // dd($request->all());
            if ($request->add_seo == 'on') {
                    $data['seo_title'] = $request->seo_title;
                    $data['seo_keyword'] = $request->seo_keyword;
                    $data['seo_description'] = $request->seo_description;
                    if ($request->block_robot_google == 'on' && !empty($request->block_robot_google)) {
                         $data['block_robot_google'] = 1;
                    }else{
                         $data['block_robot_google'] = -1;
                    }
            };
            // dd($data);
            if (!empty($request->image)) {
                $data['image'] = $request->image;
            };
            // dd($data);
            $check = Category::create($data);

            $category = Category::find($check->id);
            

            if (!empty($request->properties)) {
                $category->properties()->sync($request->properties);
            }
            
            return response(['err' => false], 200);
        }
    }

    public function edit($id){
        $categories = Category::all();
        $properties = Property::all();
        $category = Category::where('id',$id)->with('properties')->first();
        return view('admin.categories.edit',compact('category','categories','properties'));
    }

    public function saveEdit(Request $request,$id){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:categories,name,'.$id,
                'slug' => 'required|unique:categories,slug,'.$id,
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'name.unique' => 'Tên danh mục đã tồn tại,chọn tên khác',
                'slug.required' => 'Đường dẫn không được để trống',
                'slug.unique' => 'Đường dẫn đã tồn tại,chọn tên khác',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            
            $name_category = str_replace(',','-',$request->name); 
            $data = [
                'name' => $name_category,
                'slug' => to_slug(trim($request->slug)),
                'parent_id' => $request->parent_id,
            ];
            if (!empty($request->image)) {
                $data['image'] = $request->image;
            };
            if ($request->add_seo == 'on') {
                    $data['seo_title'] = $request->seo_title;
                    $data['seo_keyword'] = $request->seo_keyword;
                    $data['seo_description'] = $request->seo_description;
                    if ($request->block_robot_google == 'on' && !empty($request->block_robot_google)) {
                         $data['block_robot_google'] = 1;
                    }else{
                         $data['block_robot_google'] = -1;
                    }
            };
            $check = Category::where('id',$id)->update($data);

            $category = Category::find($id);


            if (!empty($request->properties)) {
                $category->properties()->sync($request->properties);
            }else{
               Categories_properties::where('category_id',$id)->delete();
            }

            return redirect()->route('admin.categories.index')->with('success','Cập nhập danh mục thành công');
            
        }
    }

    public function delete(Request $request){
        $check = Category::where('id',$request->id)->delete();
        
        if ($check == 1) {
            $updateCategory = Category::where('parent_id', $request->id)->update(['parent_id' => 0]);
            return response(
                [
                    'err' => false,
                    'messages' => 'Xóa thành công',

                ],
                200
            );
        }else{
            return response(
                [
                    'err' => true,
                    'messages' => 'Có lỗi xảy ra',

                ],
                200
            );
        }
    }

    public function deleteMulti(Request $request)
    {

        $data = $request->data;
        $arr = explode(',', $data);
        $check = Category::destroy($arr);
        if ($check) {
            $updateCategory = Category::whereIn('parent_id', $arr)->update(['parent_id' => 0]);
            return response()->json([
                'err' => false,
                'message' => 'success',
                'data' => $arr,
            ]);
        } else {
            return response()->json([
                'err' => true,
                'message' => 'Có gì đó sai sai',
                'data' => $arr,
            ]);
        };
    }
    
}
