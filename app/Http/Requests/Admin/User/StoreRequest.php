<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|max:100',
            'password'=>'required|min:6|max:50|',
            'email'=>'required|email|unique:users,email',
            'address'=>'required',
            'role'=>'required|in:'.implode(',',config('common.user.role')),
            'gender'=>'required|in:'. implode(',',config('common.user.gender')),
        ];
    }

    public function messages() {
        return [
            'name.max' => 'Họ tên không quá 100 ký tự',
            'password.min' => 'Mật khẩu không quá 6 ký tự',
            'password.max' => 'Mật khẩu không quá 50 ký tự',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'role.in' => 'Tài khoản phải được chọn User hoặc Admin',
            'gender.in' => 'Giới tính phải được chọn Nam hoặc Nữ',
            'required' => ':attribute không được để trống',
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Họ tên',
            'email'=>'Email',
            'password'=>'Mật khẩu',
            'address'=>'Địa chỉ',
            'role'=>'Tài khoản',
            'gender'=>'Giới tính',
        ];
    }
    
}
