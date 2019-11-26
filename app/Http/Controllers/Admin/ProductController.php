<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\DataTables\DataTables;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Products_property_values;
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
        $brands = Brand::all();
        $categories = Category::select()->with('properties')->get();
        $categories->each(function($categories){
            $categories->properties->load('property_values');
        });
        return view('admin.products.add',compact('categories','brands'));
    }

    public function saveAdd(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'slug' => 'required|unique:products,slug',
                'price' => 'required|numeric|gt:0',
                'sale_price' => 'nullable|lt:price|numeric|gt:0',
                'status' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'gift.*.value' => 'required',
                'specifications.*.key' => 'required',
                'specifications.*.value' => 'required',
                
            ],
            [
                'name.required' => 'Tên sản phẩm không được để trống',

                'slug.required' => 'Đường dẫn sản phẩm không được để trống',
                'slug.unique' => 'Đường dẫn đã tồn tại,điền đường dẫn khác',

                'price.required' => 'Giá sản phẩm không được để trống',
                'price.numeric' => 'Giá sản phẩm phải là số',
                'price.gt' => 'Giá sản phẩm phải lớn hơn 0',

                'sale_price.lt' => 'Giá khuyến mãi không thể lớn hơn giá gốc',
                'sale_price.numeric' => 'Giá khuyến mãi phải là số',
                'sale_price.gt' => 'Giá khuyến mãi lớn hơn 0',

                'status.required' => 'Trạng thái không được để trống',
                
                'category_id.required' => 'Danh mục sản phẩm không được để trống',

                'brand_id.required' => 'Hãng sản xuất không được để trống',

                'gift.*.value.required' => 'Nhập ưu đãi',

                'specifications.*.required' => 'Không được để trống',
            ]
        );

        if ($validator->fails()) {
            return response(
                [
                    'errors' => true,
                    'messages' => $validator->errors(),

                ],
                200
            );
        }else{
            
                $data = [
                'name' => $request->name,
                'slug' => to_slug($request->slug),
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'description' => $request->description,
                'infomation_detail' => $request->infomation_detail,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id
                ];

                if (!empty($request->gift)){
                    $data['gift'] = json_encode($request->gift);
                };
                
                if (!empty($request->specifications)) {
                    $data['specifications'] = json_encode($request->specifications);
                }
                
                $insertProduct = Product::create($data);
                
                if (!empty($request->gallery) && count($request->gallery) > 0) {
                    foreach ($request->gallery as $key => $value) {
                        Gallery::insert([
                            'product_id' => $insertProduct->id,
                            'image' => $value,
                        ]);
                    };
                }
                
                if (!empty($request->value_property) && count($request->value_property) > 0) {
                    foreach ($request->value_property as $key => $value) {
                        Products_property_values::insert([
                            'product_id' => $insertProduct->id,
                            'property_value_id' => $value,
                        ]);
                    }
                };
            
            
            
            return response(
                [
                    'errors' => false,
                    'messages' => 'Thêm thành công',

                ],
                200
            );
        }
    }

    public function edit($id){
        $product = Product::where('id',$id)->with('property_values', 'galleries', 'category')->first();
        $brands = Brand::all();
        $categories = Category::select()->with('properties')->get();
        $categories->each(function ($categories) {
            $categories->properties->load('property_values');
        });
        $categoriesArray = $categories->toArray();
        // dd($product);
        return view('admin.products.edit', compact('categories','product', 'categoriesArray', 'brands'));
    }

    public function saveEdit(Request $request,$id){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'slug' => 'required|unique:products,slug,'.$id,
                'price' => 'required|numeric|gt:0',
                'sale_price' => 'nullable|lt:price|numeric|gt:0',
                'status' => 'required',
                'category_id' => 'required',

                'gift.*.value' => 'required',
                'specifications.*.key' => 'required',
                'specifications.*.value' => 'required',

            ],
            [
                'name.required' => 'Tên sản phẩm không được để trống',

                'slug.required' => 'Đường dẫn sản phẩm không được để trống',
                'slug.unique' => 'Đường dẫn đã tồn tại,điền đường dẫn khác',

                'price.required' => 'Giá sản phẩm không được để trống',
                'price.numeric' => 'Giá sản phẩm phải là số',
                'price.gt' => 'Giá sản phẩm phải lớn hơn 0',

                'sale_price.lt' => 'Giá khuyến mãi không thể lớn hơn giá gốc',
                'sale_price.numeric' => 'Giá khuyến mãi phải là số',
                'sale_price.gt' => 'Giá khuyến mãi lớn hơn 0',

                'status.required' => 'Trạng thái không được để trống',

                'category_id.required' => 'Danh mục sản phẩm không được để trống',

                'gift.*.value.required' => 'Nhập ưu đãi',

                'specifications.*.required' => 'Không được để trống',
            ]
        );

        if ($validator->fails()) {
            return response(
                [
                    'errors' => true,
                    'messages' => $validator->errors(),

                ],
                200
            );
        } else {

            $data = [
                'name' => $request->name,
                'slug' => to_slug($request->slug),
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'description' => $request->description,
                'infomation_detail' => $request->infomation_detail,
                'status' => $request->status,
                'category_id' => $request->category_id,

            ];

            if (!empty($request->gift)) {
                $data['gift'] = json_encode($request->gift);
            };

            if (!empty($request->specifications)) {
                $data['specifications'] = json_encode($request->specifications);
            }

            $insertProduct = Product::where('id',$id)->update($data);

            if (!empty($request->gallery) && count($request->gallery) > 0) {
                Gallery::where('product_id',$id)->delete();
                foreach ($request->gallery as $key => $value) {
                    Gallery::insert([
                        'product_id' => $id,
                        'image' => $value,
                    ]);
                };
            }

            if (!empty($request->value_property) && count($request->value_property) > 0) {
                Products_property_values::where('product_id', $id)->delete();
                foreach ($request->value_property as $key => $value) {
                    Products_property_values::insert([
                        'product_id' => $id,
                        'property_value_id' => $value,
                    ]);
                }
            }

            return response(
                [
                    'errors' => false,
                    'messages' => 'Thêm thành công',

                ],
                200
            );
        }
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
