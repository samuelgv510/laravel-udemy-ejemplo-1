<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FormularioController;

Route::get('/blade', [HomeController::class, 'inicio'])->name('home.inicio');
Route::get('/hola', [HomeController::class, 'hola'])->name('home.hola');
Route::get('/parametros/{id}/{slug}', [HomeController::class, 'parametros'])->name('home.parametros');

Route::get('/', [TemplateController::class, 'inicio'])->name('template.inicio');
Route::get('/template/stack', [TemplateController::class, 'stack'])->name('template.stack');

Route::get('/formulario', [FormularioController::class, 'inicio'])->name('formulario.inicio');
Route::get('/formulario/simple', [FormularioController::class, 'simple'])->name('formulario.simple');
Route::post('/formulario/simple', [FormularioController::class, 'simple_post'])->name('formulario.simple.post');
