<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserDataFormController extends Controller
{
    /**
     * Display the dynamic form view with pre-defined input fields and action route.
     *
     * @return \Illuminate\View\View
     */
    public function show(): View
    {
        $action = route('user-data-form.store');
        $fields = [
            ["type" => "text", "name" => "name", "required" => true, "label" => "Imię", "class" => "my-name"],
            ["type" => "email", "name" => "email", "required" => true, "label" => "Email", "class" => "my-email"],
            ["type" => "textarea", "name" => "description", "required" => false, "label" => "Opis", "class" => "my-description"],
        ];

        return view('index', compact('action', 'fields'));
    }

    /**
     * Handle the submission of the form, validate request and return flash response.
     *
     * @param  \App\Http\Requests\UserDataFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserDataFormRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        return redirect()->back()->with([
            'success' => 'Formularz przesłany pomyślnie.',
            'data' => $validated,
        ]);
    }
}
