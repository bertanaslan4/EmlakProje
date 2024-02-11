<?php

namespace App\Http\Requests\Admin\Advert;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'avatar' =>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rent_price' => 'required|numeric',
            'deposit_price' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'address' => 'nullable|sometimes|string|max:1000',
            'country_id' => 'required|numeric',
            'state_id' => 'nullable|sometimes|numeric',
            'city_id' => 'nullable|sometimes|numeric',
            'features' => 'required|array',
            'property_details' => 'required|array',
            'facilities' => 'required|array',
            'type_id' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'thumbnail.required' => 'The :attribute field is required.',
            'thumbnail.image' => 'The :attribute must be an image.',
            'thumbnail.mimes' => 'The :attribute must be an image.',
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute must be a number.',
            'array' => 'The :attribute must be an array.',
            'string' => 'The :attribute must be a string.',
            'max' => 'The :attribute may not be greater than :max characters.',
        ];
    }
}
