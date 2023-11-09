<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function inicio()
    {
        return view('formulario.home');
    }
    public function simple()
    {
        return view('formulario.simple');
    }
    public function simple_post(Request $request)
    {
        echo $request->input('nombre');
    }
}
