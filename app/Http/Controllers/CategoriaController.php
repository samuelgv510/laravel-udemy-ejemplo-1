<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
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
    public function edit($id)
    {
        //$categoria = Categoria::where('id',$id)->first();
        $categoria = Categoria::where(['id' => $id])->firstOrFail();
        return view('categoria.edit', compact('categoria'));
    }
    public function edit_post(Request $request, $id)
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
        //$categoria = Categoria::find($id);
        $categoria = Categoria::where(['id' => $id])->firstOrFail();
        $categoria->nombre = $request->input('nombre');
        $categoria->slug = Str::slug($request->input('nombre'), '-');
        $categoria->save();
        session()->flash('css', 'success');
        session()->flash('mensaje', 'Se editó el registro exitosamente');
        return redirect()->route('categoria.inicio');
    }
    public function delete($id)
    {
        if (Producto::where(['categoria_id' => $id])->count() == 0) {
            Categoria::where(['id' => $id])->delete();
            session()->flash('css', 'danger');
            session()->flash('mensaje', 'Se eliminó el registro exitosamente');
            return redirect()->route('categoria.inicio');
        } else {
            session()->flash('css', 'danger');
            session()->flash('mensaje', 'No es posible eliminar el registro');
            return redirect()->route('categoria.inicio');
        }
    }
}
