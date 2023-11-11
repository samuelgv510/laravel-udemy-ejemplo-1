<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function inicio()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();
        //dd($categorias);
        return view('categoria.home', compact('categorias'));
    }
}
