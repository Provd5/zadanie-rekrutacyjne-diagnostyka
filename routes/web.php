<?php

use App\Http\Controllers\UserDataFormController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserDataFormController::class, 'show'])->name("index");

Route::group(["prefix" => 'user-data-form', "as" => "user-data-form."], function () {
    Route::post('', [UserDataFormController::class, 'store'])->name("store");
});
