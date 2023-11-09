<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function inicio()
    {
        return view('formulario.home');
    }
}
