<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BdController extends Controller
{
    public function inicio()
    {
        return view('bd.home');
    }
}
