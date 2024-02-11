<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminAuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email alanı boş bırakılamaz!',
            'email.email' => 'Email formatı hatalı!',
            'email.exists' => 'Email bulunamadı!',
            'password.required' => 'Şifre alanı boş bırakılamaz!',
        ];
    }
}
