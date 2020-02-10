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
            'quantity' => 'required|numeric|min:1',
            'shortText' => 'required|max:255',
            'longText' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
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
            'quantity.required' => trans('product.request.quantity.required'),
            'quantity.numberic' =>  trans('product.request.quantity.numberic'),
            'quantity.min' => trans('product.request.quantity.min'),
            'shortText.required' =>trans('product.request.shortText.required'),
            'shortText.max' => trans('product.request.shortText.max'),
            'longText.required' => trans('product.request.longText.required'),
            'category_id.required' => trans('product.request.category.required'),
            'image.required' => trans('product.request.image.required'),
            'image.mimes' =>  trans('product.request.image.mimes'),
            'image.max' => trans('product.request.image.max'),

        ];
    }
}
