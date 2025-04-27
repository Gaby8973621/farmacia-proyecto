<?php

use Illuminate\Support\Facades\Route;


// Página de bienvenida (puedes personalizarla más tarde)
Route::get('/', function () {
    return view('welcome');
});

