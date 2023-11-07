<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function inicio()
    {
        $texto = 'Hola con ñandu modificada';
        //return view('home.home', ['texto' => $texto]);
        return view('home.home', compact('texto'));
    }
    public function hola()
    {
        echo 'hola desde hola';
    }
    public function parametros($id, $slug) //http://localhost/parametros/1/mi-slug?page=1
    {
        echo 'id=' . $id . ' | slug=' . $slug . ' | page=' . $_GET['page'];
    }
}
