<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            //''
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->id,
            'password'=>'nullable|min:6',
           
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email Không được để trống!',
            'email.email'=>'Email Không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            'password.required'=>'Mật khẩu Không được để trống!',
            'password.min'=>'Mật khẩu không được nhỏ hơn 6 ký tự!',

        ];
    }
}
