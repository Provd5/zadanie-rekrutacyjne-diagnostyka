<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DynamicFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }

    /**
     * Custom error messages
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Pole imię jest obowiązkowe.',
            'name.min' => 'Pole imię musi mieć co najmniej :min znaki.',
            'name.max' => 'Pole imię nie może mieć więcej niż :max znaków.',
            'email.required' => 'Pole email jest obowiązkowe.',
            'email.email' => 'Pole email musi być poprawnego formatu.',
            'description.max' => 'Opis może mieć maksymalnie :max znaków.',
        ];
    }
}
