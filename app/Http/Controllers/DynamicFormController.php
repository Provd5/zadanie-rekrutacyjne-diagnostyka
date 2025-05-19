<?php

namespace App\Http\Controllers;

use App\Http\Requests\DynamicFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DynamicFormController extends Controller
{
    /**
     * Display the dynamic form view with pre-defined input fields and action route.
     *
     * @return \Illuminate\View\View
     */
    public function show(): View
    {
        $action = route('dynamic-form.store');
        $fields = [
            ["type" => "text", "name" => "name", "required" => true, "label" => "Imię", "class" => "my-name"],
            ["type" => "email", "name" => "email", "required" => true, "label" => "Email", "class" => "my-email"],
            ["type" => "textarea", "name" => "description", "required" => false, "label" => "Opis", "class" => "my-description"],
        ];

        return view('index', compact('action', 'fields'));
    }

    /**
     * Handle the submission of the dynamic form, validate request and return flash response.
     *
     * @param  \App\Http\Requests\DynamicFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DynamicFormRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return redirect()->back()->with([
            'success' => 'Formularz przesłany pomyślnie.',
            'data' => $validated,
        ]);
    }
}
