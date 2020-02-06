<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address' => 'required',
            'email' => 'required',
            'state' => 'required',
            'phone' => 'required|numeric|min:10',
            'accept' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'accept.required' => trans('order.condition'),
        ];
    }
}
