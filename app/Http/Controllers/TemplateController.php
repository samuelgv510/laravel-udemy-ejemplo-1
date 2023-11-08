<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function inicio()
    {
        return view('template.home');
    }
    public function stack()
    {
        return view('template.stack');
    }
}
