<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Property_value;
use DataTables;
use Validator;
class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index');
    }

    public function getData()
    {
        $properties = Property::select()->orderBy('id', 'desc')->with('property_values')->get();
        return Datatables::of($properties)->make();
    }

    public function saveAdd(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:properties,name'
            ],
            [
                'name.required' => 'Tên thuộc tính không được để trống',
                'name.unique' => 'Tên thuộc tính đã tồn tại, điền tên khác !'
            ]
        );

        if ($validator->fails()) {
            return response(
                [
                    'err' => true,
                    'messages' => $validator->errors(),
                ],
                200
            );
        }else{
            $insert = Property::insert([
                'name' => $request->name,
                'slug' => to_slug($request->name),
            ]);
            if ($insert) {
                return response(
                    [
                        'err' => false,
                        'messages' => 'Thêm thành công',
                    ],
                    200
                );
            }else{
                return response(
                    [
                        'err' => true,
                        'messages' => 'Có gì đó sai sai',
                    ],
                    200
                );
            }
            
        }
    }


    public function edit($id){
        $property = Property::where('id',$id)->first();
        return view('admin.properties.edit',compact('property'));
    }

    public function saveEdit(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:properties,name,' . $id,
                
            ],
            [
                'name.required' => 'Tên hãng không được trống',
                'name.unique' => 'Tên hãng đã tồn tại',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $update = Property::where('id', $id)->update([
                'name' => $request->name,
                'slug' => to_slug($request->name),
            ]);
            if ($update > 0) {
                return redirect()->route('admin.properties.index')->with('success', 'Cập nhập thuộc tính thành công');
            } else {
                return redirect()->route('admin.properties.index')->with('fail', 'Cập nhập thuộc tính không thành công');
            }
        }
    }


    public function delete(Request $request)
    {
        $check = Property::where('id', $request->id)->delete();

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
        $check = Property::destroy($arr);
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
