<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:50|min:5',
            'email' => "required|email|unique:users,email,{$this->id},id,deleted_at,NULL",
            'password' => 'max:32|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'role' => 'required',
            'status' => 'required',
            'profile.phone' => 'required|numeric|min:10',
            'profile.language' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  trans('user.valid.name.required'),
            'name.max' =>  trans('user.valid.name.max'),
            'name.min' =>  trans('user.valid.name.min'),
            'email.required' =>  trans('user.valid.email.required'),
            'email.max' =>  trans('user.valid.email.max'),
            'email.min' =>  trans('user.valid.email.min'),
            'password.min' =>  trans('user.valid.password.min'),
            'password.max' =>  trans('user.valid.password.max'),
            'password.required' =>  trans('user.valid.password.required'),
            'role.required' =>  trans('user.valid.role.required'),
            'status.required' =>  trans('user.valid.status.required'),
            'profile.phone.required' => trans('user.valid.phone.required'),
            'profile.phone.numeric' => trans('user.valid.phone.numeric'),
            'profile.phone.min' => trans('user.valid.phone.min'),
            'profile.phone.max' => trans('user.valid.phone.max'),
            'profile.language.required' => trans('user.valid.language.required'),
        ];
    }
}
