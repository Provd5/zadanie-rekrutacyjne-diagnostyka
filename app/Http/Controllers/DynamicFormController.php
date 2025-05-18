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
        ]);

        return redirect()->back()->with([
            'success' => 'Formularz przesłany pomyślnie.',
            'data' => $validated,
        ]);
    }
}
