<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItem extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'starting_price' => 'required|numeric',
            'payment_method' => 'nullable|string|max:255',
            'delivery_method' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ];
    }
}
