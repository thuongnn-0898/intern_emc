<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'content' => 'required|max:255',
            'rates' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Chưa nhập nội dung review',
            'content.max' => 'Nội dung quá dài ',
            'rates.required' => 'Cần đánh giá cho review ',
        ];
    }
}
