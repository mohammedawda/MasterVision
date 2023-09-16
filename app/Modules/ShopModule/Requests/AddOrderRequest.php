<?php

namespace App\Modules\ShopModule\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'mobile'   => 'required|digits:11',
            'products' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'mobile.required'   => 'mobile is required',
            'mobile.digits'     => 'mobile must be 11 number',
            'products.required' => 'products is required',
        ];
    }
}
