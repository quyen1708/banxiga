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
            'cus_name'=>'required',
            'cus_phone'=>'required',
            'cus_email'=>'required'|'email:rfc,dns',
            'cus_address'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'cus_name.required'=>'Tên không được để trống!',
            'cus_phone.required'=>'Email không được để trống!',
            'cus_email.max'=>'Số điện thoại không được để trống!',
            'cus_address.max'=>'Địa chỉ không được để trống!',
        ];
    }
}
