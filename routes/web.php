<?php

use App\Http\Controllers\DynamicFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name("index");

Route::group(["prefix" => 'dynamic-form', "as" => "dynamic-form."], function () {
    Route::post('', [DynamicFormController::class, 'store'])->name("store");
});
