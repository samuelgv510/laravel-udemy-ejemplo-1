<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilesController extends Controller
{
    public function inicio()
    {
        return view('utiles.home');
    }
    public function pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1><img src="https://www.tamila.cl/assets/img/logo_2.png" />');
        $mpdf->Output();
    }
}
