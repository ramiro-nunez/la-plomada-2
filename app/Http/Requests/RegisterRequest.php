<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            // 'unique:users' verifica automáticamente en la DB que el correo no exista
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // Exigimos que la contraseña sea segura y coincida con un campo 'password_confirmation' del front
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
    // Opcional: Personalizar los mensajes de error
    public function messages(): array
    {
        return [
            'email.unique' => 'Este correo ya está registrado en nuestra tienda.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
