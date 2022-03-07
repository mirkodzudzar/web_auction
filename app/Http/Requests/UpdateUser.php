<?php

namespace App\Http\Requests;

use App\Rules\MatchCurrentPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            // Custom rule to confirm current password so we can change its value, it can be null also.
            'current_password' => ['nullable', new MatchCurrentPassword],
            // If current password is entered, this field is required and value needs to be different.
            'password' => 'confirmed|nullable|different:current_password|required_with:current_password|min:8',
            // If new password is entered (or current password), then this field is also required.
            "password_confirmation" =>"nullable|required_with:password|required_with:current_password",
        ];
    }
}
