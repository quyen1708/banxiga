<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BanxigaCreateRequest extends FormRequest
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
            'name'=>'bail|required',
            'phone'=>'bail|required',
            'email'=>'bail|required|email',
            'address'=>'bail|required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống!',
            'phone.required'=>'Số điện thoại không được để trống!',
            'email.required'=>'Email không được để trống!',
            'address.required'=>'Địa chỉ không được để trống!',
        ];
    }
}
