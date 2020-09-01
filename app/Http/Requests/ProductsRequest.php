<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'   => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'amont'         => 'required',

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required'   => 'Category không được để trống!',
            'name.required'          => 'Tên sản phẩm không được để trống!',
            'description.required'   => 'Mô tả không được để trống!',
            'price.required'         => 'Giá sản phẩm không được để trống',
            'amont.required'         => 'Số lượng không được để trống!',
        ];
    }
}
