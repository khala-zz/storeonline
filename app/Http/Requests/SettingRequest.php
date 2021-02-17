<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'config_key' => 'bail|required|unique:settings',
            'config_value' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'config_key.required' => 'Config key không được bỏ trống',
            'config_key.unique' => 'Config key đã tồn tại',
            'config_value' => 'Config key không được bỏ trống'
        ];
    }
}
