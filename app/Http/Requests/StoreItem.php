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
            'name' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:5',
            'starting_price' => 'required|integer|max:1000000000',
            'payments' => 'nullable|exists:payments,id',
            'deliveries' => 'required|exists:deliveries,id',
            'category' => 'required|max:1|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ];
    }
}
