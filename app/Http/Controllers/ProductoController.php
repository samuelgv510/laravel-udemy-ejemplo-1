<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function inicio()
    {
        $productos = Producto::orderBy('id', 'desc')->get();
        return view('producto.home', compact('productos'));
    }
    public function add()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('producto.add', compact('categorias'));
    }
    public function add_post(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|min:6',
                'precio' => 'required|numeric',
                'descripcion' => 'required',
            ],
            [
                'nombre.required' => 'El campo Nombre está vacío',
                'nombre.min' => 'El campo Nombre debe tener al menos 6 caracteres',
                'precio.required' => 'El campo Precio está vacío',
                'precio.numeric' => 'El Precio ingresado no es válido',
                'descripcion.required' => 'El campo Descripción está vacío',
            ]
        );
        Producto::create(
            [
                'nombre' => $request->input('nombre'),
                'slug' => Str::slug($request->input('nombre'), '-'),
                'descripcion' => $request->input('descripcion'),
                'fecha' => date('Y-m-d'),
                'precio' => $request->input('precio'),
                'categoria_id' => $request->input('categoria_id'),
                'stock' => $request->input('stock'),
            ]
        );
        session()->flash('css', 'success');
        session()->flash('mensaje', 'Se creó el registro');
        return redirect()->route('producto.inicio');
    }
}
