<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function inicio()
    {
        $productos = Producto::orderBy('id', 'desc')->get();
        return view('producto.home', compact('productos'));
    }
}
