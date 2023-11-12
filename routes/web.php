<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BdController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

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

Route::get('/email', [EmailController::class, 'inicio'])->name('email.inicio');
Route::get('/email/enviar', [EmailController::class, 'enviar'])->name('email.enviar');

Route::get('/bd', [BdController::class, 'inicio'])->name('bd.inicio');

Route::get('/categoria', [CategoriaController::class, 'inicio'])->name('categoria.inicio');
Route::get('/categoria/add', [CategoriaController::class, 'add'])->name('categoria.add');
Route::post('/categoria/add', [CategoriaController::class, 'add_post'])->name('categoria.add.post');
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::post('/categoria/edit/{id}', [CategoriaController::class, 'edit_post'])->name('categoria.edit.post');
Route::get('/categoria/delete/{id}', [CategoriaController::class, 'delete'])->name('categoria.delete');
Route::post('/categoria/edit/{id}', [CategoriaController::class, 'edit_post'])->name('categoria.edit.post');

Route::get('/producto', [ProductoController::class, 'inicio'])->name('producto.inicio');
