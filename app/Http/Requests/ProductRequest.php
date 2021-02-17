<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'name' => 'bail|required|unique:categories',
            'parent_id' => 'bail|required',
            'status' => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Tên danh mục sản phẩm không được bỏ trống',
            'name.unique' => 'Tên danh mục sản phẩm không được trùng',
            'parent_id.required' => 'Danh mục sản phẩm cha không được bỏ trống',
            'status.required' => 'Vui lòng chọn trạng thái'
        ];
    }
}
