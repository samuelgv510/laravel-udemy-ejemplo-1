<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\ProductoFoto;
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
    public function edit($id)
    {
        $producto = Producto::where(['id' => $id])->firstOrFail();
        $categorias = Categoria::orderBy('nombre', 'asc')->get();
        return view('producto.edit', compact('producto', 'categorias'));
    }
    public function edit_post(Request $request, $id)
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
        //$categoria = Categoria::find($id);
        $producto = Producto::where(['id' => $id])->firstOrFail();
        $producto->nombre = $request->input('nombre');
        $producto->slug = Str::slug($request->input('nombre'), '-');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->save();
        session()->flash('css', 'success');
        session()->flash('mensaje', 'Se editó el registro exitosamente');
        return redirect()->route('producto.inicio');
    }
    public function delete($id)
    {
        Producto::where(['id' => $id])->firstOrFail();
        if (ProductoFoto::where(['producto_id' => $id])->count() == 0) {
            Producto::where(['id' => $id])->delete();
            session()->flash('css', 'success');
            session()->flash('mensaje', 'Se eliminó el registro exitosamente');
            return redirect()->route('producto.inicio');
        } else {
            session()->flash('css', 'danger');
            session()->flash('mensaje', 'No es posible eliminar el registro');
            return redirect()->route('producto.inicio');
        }
    }
    public function productoCategoria($id)
    {
        $categoria = Categoria::where(['id' => $id])->firstOrFail();
        $productos = Producto::where(['categoria_id' => $id])->orderBy('id', 'desc')->get();
        return view('producto.categoria', compact('productos', 'categoria'));
    }
    public function productoFotos($id)
    {
        $producto = Producto::where(['id' => $id])->firstOrFail();
        $fotos = ProductoFoto::where(['producto_id' => $id])->orderBy('id', 'desc')->get();
        return view('producto.foto', compact('fotos', 'producto'));
    }
    public function productoFotos_post(Request $request, $id)
    {
        Producto::where(['id' => $id])->firstOrFail();
        $request->validate(
            [
                'foto' => 'required|mimes:jpg,bmp,png|max:2048'
            ],
            [
                'foto.required' => 'El campo foto está vacío',
                'foto.mimes' => 'El campo foto debe ser JPG|PNG'
            ]
        );
        switch ($_FILES['foto']['type']) {
            case 'image/png':
                $archivo = time() . ".png";
                break;
            case 'image/jpeg':
                $archivo = time() . ".jpg";
                break;
        }
        copy($_FILES['foto']['tmp_name'], 'uploads/productos/' . $archivo);
        ProductoFoto::create(
            [
                'nombre' => $archivo,
                'producto_id' => $id,
            ]
        );
        session()->flash('css', 'success');
        session()->flash('mensaje', 'Se subió el archivo exitosamente');
        return redirect()->route('producto.fotos', ['id' => $id]);
    }
    public function deleteFoto(Request $request, $producto_id, $foto_id)
    {
        Producto::where(['id' => $producto_id])->firstOrFail();
        $foto = ProductoFoto::where(['id' => $foto_id])->firstOrFail();
        unlink('uploads/productos/' . $foto->nombre);

        ProductoFoto::where(['id' => $foto_id])->delete();
        session()->flash('css', 'success');
        session()->flash('mensaje', 'Se eliminó el registro exitosamente');
        return redirect()->route('producto.fotos', ['id' => $producto_id]);
    }
}
