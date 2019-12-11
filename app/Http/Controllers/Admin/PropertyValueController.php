<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Models\Property_value;
use App\Models\Property;
class PropertyValueController extends Controller
{
    public function index($id)
    {
        $property = Property::where('id', $id)->first();
        return view('admin.properties.list_value',compact('property'));
    }

    public function getData($id)
    {
        $property_values = Property_value::where('property_id',$id)->with('property')->get();
        return Datatables::of($property_values)->make();
    }


    public function saveAddValue(Request $request,$id)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Giá trị không được để trống',
                'name.unique' => 'Giá trị đã tồn tại !'
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
        } else {
            $insert = Property_value::insert([
                'name' => $request->name,
                'slug' => to_slug($request->name).getToken(4),
                'property_id' => $id
            ]);
            if ($insert) {
                return response(
                    [
                        'err' => false,
                        'messages' => 'Thêm thành công',
                    ],
                    200
                );
            } else {
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


    public function edit($id)
    {
        $property_value = Property_value::where('id', $id)->with('property')->first();
        // dd($property_value);
        return view('admin.properties.edit_value', compact('property_value'));
    }

    public function saveEdit(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'Tên hãng không được trống',
                'name.unique' => 'Tên hãng đã tồn tại',

            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $update = Property_value::where('id', $id)->update([
                'name' => $request->name,
                'slug' => to_slug($request->name).getToken(4),
            ]);
            if ($update > 0) {
                return redirect()->route('admin.properties.index')->with('success', 'Cập nhập giá trị thành công');
            } else {
                return redirect()->route('admin.properties.index')->with('fail', 'Cập nhập giá trị không thành công');
            }
        }
    }

    public function delete(Request $request)
    {
        // dd($request->all());
        $check = Property_value::where('id', $request->id)->delete();

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
        $check = Property_value::destroy($arr);
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
