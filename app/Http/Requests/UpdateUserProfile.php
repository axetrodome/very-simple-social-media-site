<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfile extends FormRequest
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
            'image' => [
                'dimensions:min_width=200,min_height=200',
                'mimes:jpeg,jpg,png',
                'max:5000',
            ],
            'name' => [
                'required',
                'min:2',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'image.mimes' => 'Image must be jpeg,jpg or png',
            'email.required'  => 'Email is required',
        ];
    }
}
