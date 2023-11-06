<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'inicio'])->name('home.inicio');
Route::get('/hola', [HomeController::class, 'hola'])->name('home.hola');
Route::get('/parametros/{id}/{slug}', [HomeController::class, 'parametros'])->name('home.parametros');
