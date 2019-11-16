<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use DataTables;
use Validator;
class BrandController extends Controller
{
    public function index(){
        return view('admin.brands.index');
    }

    public function getData(){
        $brands = Brand::select()->orderBy('id', 'desc')->get();
        // dd($brands);
        return Datatables::of($brands)->make();
    }

    public function saveAdd(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:brands,name',
                'slug' => 'required|unique:brands,slug',
                'image' => 'required'
            ],
            [
                'name.required' => 'Tên hãng không được trống',
                'name.unique' => 'Tên hãng đã tồn tại',
                'slug.required' => 'Đường dẫn không được để trống',
                'slug.unique' => 'Đường dẫn bị trùng. Điền đường dẫn khác',
                'image.required' => 'Banner không được để trống'
            ]
        );

        if ($validator->fails()) {
            return response([
                'err' => true,
                'messages' => $validator->errors(),
            ]);
        }else{
            $insertBrand = Brand::insert([
                'image' => $request->image,
                'name' => $request->name,
                'slug' => $request->slug
            ]);
            if ($insertBrand) {
                return response([
                    'err' => false,
                    'messages' => 'Thêm hãng sản xuất thành công',
                ]);
            }else{
                return response([
                    'err' => true,
                    'messages' => 'Thêm hãng sản xuất không thành công',
                ]);
            }
            
        }
    }

    public function edit($id){
        $brand = Brand::where('id',$id)->first();
        return view('admin.brands.edit',compact('brand'));
    }

    public function saveEdit(Request $request,$id){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:brands,name,'.$id,
                'slug' => 'required|unique:brands,slug,'.$id,
                'image' => 'required'
            ],
            [
                'name.required' => 'Tên hãng không được trống',
                'name.unique' => 'Tên hãng đã tồn tại',
                'slug.required' => 'Đường dẫn không được để trống',
                'slug.unique' => 'Đường dẫn bị trùng. Điền đường dẫn khác',
                'image.required' => 'Banner không được để trống'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
           
        } else {
            $updateBrand = Brand::where('id',$id)->update([
                'image' => $request->image,
                'name' => $request->name,
                'slug' => $request->slug
            ]);
            if ($updateBrand > 0 ) {
                return redirect()->route('admin.brands.index')->with('success', 'Cập nhập danh mục thành công');
            } else {
                return redirect()->route('admin.brands.index')->with('fail', 'Cập nhập danh mục không thành công');
            }
        }
    }

    public function delete(Request $request)
    {
        $check = Brand::where('id', $request->id)->delete();

        if ($check == 1) {
            return response(
                [
                    'err' => false,
                    'messages' => 'Xóa thành công',

                ],
                200
            );
        } else {
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
        $check = Brand::destroy($arr);
        if ($check) {
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
