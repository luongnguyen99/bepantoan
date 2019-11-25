<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'slug'=>'required',
            'view'=>'numeric',
            
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Tiêu đề không được để trống',
            'slug.required'=>'Đường dẫn không được để trống',
            'view.numeric'=>'Số lượng truy cập chỉ được nhập số',
        ];
    }
}
