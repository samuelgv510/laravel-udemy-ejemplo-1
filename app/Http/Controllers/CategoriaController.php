<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function inicio()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();
        //dd($categorias);
        return view('categoria.home', compact('categorias'));
    }
    public function add()
    {
        return view('categoria.add');
    }
    public function add_post(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|min:6',
            ],
            [
                'nombre.required' => 'El campo Nombre está vacío',
                'nombre.min' => 'El campo Nombre debe tener al menos 6 caracteres',
            ]
        );
        Categoria::create(
            [
                'nombre' => $request->input('nombre'),
                'slug' => Str::slug($request->input('nombre'), '-')
            ]
        );
        session()->flash('css', 'success');
        session()->flash('mensaje', 'Se creó el registro');
        return redirect()->route('categoria.inicio');
    }
}
