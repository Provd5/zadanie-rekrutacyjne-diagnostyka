<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class DynamicFormController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'description' => ['nullable', 'string', 'max:500'],
        ], [
            'name.required' => 'Pole imię jest obowiązkowe.',
            'name.min' => 'Pole imię musi mieć co najmniej :min znaki.',
            'name.max' => 'Pole imię nie może mieć więcej niż :max znaków.',
            'email.required' => 'Pole email jest obowiązkowe.',
            'email.email' => 'Pole email musi być poprawnego formatu.',
            'description.max' => 'Opis może mieć maksymalnie :max znaków.',
        ]);

        return redirect()->back()->with([
            'success' => 'Formularz przesłany pomyślnie.',
            'data' => $validated,
        ]);
    }
}
