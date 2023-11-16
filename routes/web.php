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
use App\Http\Controllers\UtilesController;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\ProtegidaController;

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

Route::get('/producto', [ProductoController::class, 'inicio'])->name('producto.inicio');
Route::get('/producto/add', [ProductoController::class, 'add'])->name('producto.add');
Route::post('/producto/add', [ProductoController::class, 'add_post'])->name('producto.add.post');
Route::get('/producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/producto/edit/{id}', [ProductoController::class, 'edit_post'])->name('producto.edit.post');
Route::get('/producto/delete/{id}', [ProductoController::class, 'delete'])->name('producto.delete');

Route::get('/producto/categoria/{id}', [ProductoController::class, 'productoCategoria'])->name('producto.categoria');
Route::get('/producto/foto/{id}', [ProductoController::class, 'productoFotos'])->name('producto.fotos');
Route::post('/producto/foto/{id}', [ProductoController::class, 'productoFotos_post'])->name('producto.fotos.post');
Route::get('/producto/foto/delete/{producto_id}/{foto_id}', [ProductoController::class, 'deleteFoto'])->name('producto.foto.delete');

Route::get('/producto/paginacion', [ProductoController::class, 'paginacion'])->name('producto.paginacion');
Route::get('/producto/buscador', [ProductoController::class, 'buscador'])->name('producto.buscador');

Route::get('/utiles', [UtilesController::class, 'inicio'])->name('utiles.inicio');
Route::get('/utiles/pdf', [UtilesController::class, 'pdf'])->name('utiles.pdf');
Route::get('/utiles/excel', [UtilesController::class, 'excel'])->name('utiles.excel');
Route::get('/utiles/cliente-rest', [UtilesController::class, 'cliente_rest'])->name('utiles.cliente_rest');
Route::get('/utiles/cliente-soap', [UtilesController::class, 'cliente_soap'])->name('utiles.cliente_soap');

Route::get('/acceso/login', [AccesoController::class, 'login'])->name('acceso.login');
Route::get('/acceso/salir', [AccesoController::class, 'salir'])->name('acceso.salir');
Route::post('/acceso/login', [AccesoController::class, 'login_post'])->name('acceso.login.post');
Route::get('/acceso/registro', [AccesoController::class, 'registro'])->name('acceso.registro');
Route::post('/acceso/registro', [AccesoController::class, 'registro_post'])->name('acceso.registro.post');

Route::get('/protegida', [ProtegidaController::class, 'inicio'])->name('protegida.inicio');
Route::get('/protegida/otra', [ProtegidaController::class, 'otra'])->name('protegida.otra');
