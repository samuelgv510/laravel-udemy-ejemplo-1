<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;

Route::get('/blade', [HomeController::class, 'inicio'])->name('home.inicio');
Route::get('/hola', [HomeController::class, 'hola'])->name('home.hola');
Route::get('/parametros/{id}/{slug}', [HomeController::class, 'parametros'])->name('home.parametros');

Route::get('/', [TemplateController::class, 'inicio'])->name('template.inicio');
