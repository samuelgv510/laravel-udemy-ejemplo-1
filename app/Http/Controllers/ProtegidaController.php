<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProtegidaController extends Controller
{
    public function inicio()
    {
        return view('protegida.home');
    }
    public function otra()
    {
        return view('protegida.otra');
    }
}
