<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccesoController extends Controller
{
    public function login()
    {
    }
    public function registro()
    {
        return view('acceso.registro');
    }
    public function registro_post(Request $request)
    {
    }
}
