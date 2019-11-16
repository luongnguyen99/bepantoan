<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Category;
use Validator;
use App\Models\Brand;
use App\Models\Property;
class CategoryController extends Controller
{
    
    public function getData(){
        $categories = Category::select()->orderBy('id', 'desc')->with('properties','brands')->get();
        $categoriesRecursive = $this->categoriesRecursive($categories);
        return Datatables::of($categoriesRecursive)->make();
    }

    public function index(){

        $categories = Category::all();
        $brands = Brand::all();
        $properties = Property::all();
        return view('admin.categories.index',compact('categories','brands','properties'));
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
                'brands' => 'required',
            ],
            [
                'name.required' => 'Tên danh mục không được để trống.',
                'name.unique' => 'Tên danh mục đã tồn tại,chọn tên khác.',
                'slug.required' => 'Đường dẫn không được để trống.',
                'slug.unique' => 'Đường dẫn đã tồn tại,chọn tên khác.',
                'brands.required' => 'Chọn hãng sản xuất mặt hàng này.',
            ]
        );

        if ($validator->fails()) {
            return response(
                [
                    'err' => true,
                    'messages' => $validator->errors(),
                    
                ], 200);
        }else{
           
            $check = Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' => $request->parent_id,
            ]);

            $category = Category::find($check->id);
            
            if (!empty($request->brands)) {
                $category->brands()->sync($request->brands);
            };

            if (!empty($request->properties)) {
                $category->properties()->sync($request->properties);
            }
            
            return response(['err' => false], 200);
        }
    }

    public function edit($id){
        $categories = Category::all();
        $brands = Brand::all();
        $properties = Property::all();
        $category = Category::where('id',$id)->with('brands','properties')->first();
        // dd($category);
        return view('admin.categories.edit',compact('category','categories','brands','properties'));
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

            $check = Category::where('id',$id)->update([
                'name' => trim($request->name),
                'slug' => trim($request->slug),
                'parent_id' => $request->parent_id,
            ]);

            $category = Category::find($id);

            if (!empty($request->brands)) {
                $category->brands()->sync($request->brands);
            };

            if (!empty($request->properties)) {
                $category->properties()->sync($request->properties);
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
