<?php

namespace App\Http\Controllers;

use App\Http\Requests\DynamicFormRequest;

class DynamicFormController extends Controller
{
    public function store(DynamicFormRequest $request)
    {
        $validated = $request->validated();

        return redirect()->back()->with([
            'success' => 'Formularz przesłany pomyślnie.',
            'data' => $validated,
        ]);
    }
}
