<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\HelperController;

Route::get('/blade', [HomeController::class, 'inicio'])->name('home.inicio');
Route::get('/hola', [HomeController::class, 'hola'])->name('home.hola');
Route::get('/parametros/{id}/{slug}', [HomeController::class, 'parametros'])->name('home.parametros');

Route::get('/', [TemplateController::class, 'inicio'])->name('template.inicio');
Route::get('/template/stack', [TemplateController::class, 'stack'])->name('template.stack');

Route::get('/formulario', [FormularioController::class, 'inicio'])->name('formulario.inicio');
Route::get('/formulario/simple', [FormularioController::class, 'simple'])->name('formulario.simple');
Route::post('/formulario/simple', [FormularioController::class, 'simple_post'])->name('formulario.simple.post');
Route::get('/formulario/flash', [FormularioController::class, 'flash'])->name('formulario.flash');
Route::get('/formulario/flash2', [FormularioController::class, 'flash2'])->name('formulario.flash2');
Route::get('/formulario/flash3', [FormularioController::class, 'flash3'])->name('formulario.flash3');
Route::get('/formulario/upload', [FormularioController::class, 'upload'])->name('formulario.upload');
Route::post('/formulario/upload', [FormularioController::class, 'upload_post'])->name('formulario.upload.post');

Route::get('/helper', [HelperController::class, 'inicio'])->name('helper.inicio');
