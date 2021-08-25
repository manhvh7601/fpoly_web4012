<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'image'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'desc'=>'required',
        ];
    }
    public function messages(){
        return [
        'required' => ':attribute không được để trống'
        ];
    }
    public function attributes(){
        return [
            'name'=>'Tên sản phẩm',
            'image'=>'Ảnh sản phẩm',
            'price'=>'Giá sản phẩm',
            'quantity'=>'Số lượng sản phẩm',
            'category_id'=>'Tên danh mục',
            'desc'=>'Mô tả sản phẩm',
        ];
    }
}
