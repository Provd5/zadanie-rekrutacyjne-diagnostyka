<?php

use App\Http\Controllers\DynamicFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name("index");

Route::post('/dynamic-form', [DynamicFormController::class, 'store'])->name("api.dynamic-form.store");
