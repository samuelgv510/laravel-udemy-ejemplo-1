<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function inicio()
    {
        return view('email.home');
    }
    public function enviar(Request $request)
    {
    }
}
