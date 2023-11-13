<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilesController extends Controller
{
    public function inicio()
    {
        return view('utiles.home');
    }
}
