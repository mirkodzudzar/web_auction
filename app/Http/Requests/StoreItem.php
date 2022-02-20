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
            'description' => 'required|string',
            'starting_price' => 'required|integer',
            'payments' => 'nullable|exists:payments,id',
            'deliveries' => 'required|exists:deliveries,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ];
    }
}
