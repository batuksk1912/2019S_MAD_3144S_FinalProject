<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|min:1',
            'last_name' => 'required|min:1',
            'password' => 'nullable|confirmed|min:6',
            'email' => 'required',
            'phone_number' => 'required|min:14',
            'address' => 'required|min:5',
        ];
    }
}
