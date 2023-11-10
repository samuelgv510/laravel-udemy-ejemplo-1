<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EjemploMailable;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function inicio()
    {
        return view('email.home');
    }
    public function enviar(Request $request)
    {
        $html = "<h2>Este es el cuerpo del correo</h2><hr>Hola más texto";
        $correo = new EjemploMailable($html);
        Mail::to("samuelg510@gmail.com")->send($correo);
        session()->flash('css', 'success');
        session()->flash('mensaje', 'Se envió el mail exitosamente');
        return redirect()->route('email.inicio');
    }
}
