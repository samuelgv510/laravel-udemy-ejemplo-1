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
    public function parametros($id, $slug) //http://localhost/parametros/1/mi-slug?page=1
    {
        echo 'id=' . $id . ' | slug=' . $slug . ' | page=' . $_GET['page'];
    }
}
