<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function inicio()
    {
        echo 'hola desde mi ruta de controlador';
    }
    public function hola()
    {
        echo 'hola desde hola';
    }
}
