<?php

namespace App\Http\Requests\Dashboard\User;

use App\Enums\Profession;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'salutation' => 'nullable|sometimes|integer',
            'street' => 'required|string|max:1000',
            'street_number' => 'nullable|sometimes|string|max:255',
            'address_suffix' => 'nullable|sometimes|string|max:255',
            'postal_code' => 'required|string|max:255',
            'country_id' => 'required|numeric',
            'state_id' => 'nullable|sometimes|numeric',
            'city_id' => 'nullable|sometimes|numeric',
            'phone' => 'nullable|sometimes|string|max:255',
            'dob' => 'nullable|sometimes|string',
            'proffession' => [new Enum(Profession::class)],
            'eu_citizen' => 'nullable|sometimes|boolean',
            'nationality_id' => 'nullable|sometimes|numeric',
        ];
    }
}
