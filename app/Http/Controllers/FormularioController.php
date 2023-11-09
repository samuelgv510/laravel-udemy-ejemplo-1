<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function inicio()
    {
        return view('formulario.home');
    }
    public function simple()
    {
        $paises = array(
            array("nombre" => "Chile", "id" => 1),
            array("nombre" => "Perú", "id" => 2),
            array("nombre" => "Venezuela", "id" => 3),
            array("nombre" => "México", "id" => 4),
            array("nombre" => "España", "id" => 5),
        );
        return view('formulario.simple', compact('paises'));
    }
    public function simple_post(Request $request)
    {
        //echo $request->input('nombre');
        $request->validate(
            [
                'nombre' => 'required|min:6',
                'correo' => 'required|email:rfc,dns',
                'descripcion' => 'required',
                'password' => 'required|min:6'
            ],
            [
                'nombre.required' => 'El campo Nombre está vacío',
                'nombre.min' => 'El campo Nombre debe tener al menos 6 caracteres',
                'correo.required' => 'El campo E-Mail está vacío',
                'correo.email' => 'El E-Mail ingresado no es válido',
                'descripcion.required' => 'El campo Descricpion está vacío',
                'password.required' => 'El campo Contraseña está vacío',
                'password.min' => 'El campo Contraseña debe tener al menos 6 caracteres',
            ]
        );
    }
}
