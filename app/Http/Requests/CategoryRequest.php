<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'name' => "required|
                       max:50|
                       unique:categories, name, { $this->id }, id, deleted_at, NULL",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('category.valid.required'),
            'name.max' => trans('category.valid.max'),
            'name.unique' => trans('category.valid.uni'),
        ];
    }
}
