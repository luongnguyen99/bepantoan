<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\DataTables\DataTables;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class ProductController extends Controller
{
    public function getData(){
        $products = Product::select()->orderBy('id', 'desc')->with('category')->get();
        return Datatables::of($products)->make();
    }
    public function index(){
        return view('admin.products.index');
    }

    public function add(){
        $categories = Category::select()->with('properties')->get();
        $categories->each(function($categories){
            $categories->properties->load('property_values');
        });
        return view('admin.products.add',compact('categories'));
    }

    public function saveAdd(Request $request){

    }

    public function delete(Request $request)
    {
        $check = Product::where('id', $request->id)->delete();

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
        $check = Product::destroy($arr);
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
