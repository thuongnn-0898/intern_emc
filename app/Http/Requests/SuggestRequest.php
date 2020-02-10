<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuggestRequest extends FormRequest
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
            'name' => "required|max:100|min:5|unique:products,name,{$this->id},id,deleted_at,NULL",
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('product.request.name.required'),
            'name.max' => trans('product.request.name.max'),
            'name.min' => trans('product.request.name.max'),
            'name.unique' =>  trans('product.request.name.uni'),
            'price.required' => trans('product.request.price.required'),
            'price.number' =>  trans('product.request.price.number'),
            'image.required' => trans('product.request.image.required'),
            'image.mimes' =>  trans('product.request.image.mimes'),
            'image.max' => trans('product.request.image.max'),
            'message.required' => trans('product.request.longText.required'),

        ];
    }
}
