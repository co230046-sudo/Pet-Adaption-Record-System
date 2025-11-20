<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

//Default Homepage
Route::get('/', function () {
    return redirect()->route('pets.index');
});

//Import PetController
Route::resource('pets', PetController::class);
