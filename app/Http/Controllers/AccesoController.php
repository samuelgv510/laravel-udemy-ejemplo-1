<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMetadata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccesoController extends Controller
{
    public function login()
    {
        return view('acceso.login');
    }
    public function login_post(Request $request)
    {
        $request->validate(
            [
                'correo' => 'required|email:rfc,dns',
                'password' => 'required|min:6'
            ],
            [
                'correo.required' => 'El campo E-Mail está vacío',
                'correo.email' => 'El E-Mail ingresado no es válido',
                'password.required' => 'El campo Password está vacío',
                'password.min' => 'El campo Password debe tener al menos 6 caracteres'
            ]
        );
        if (Auth::attempt(['email' => $request->input('correo'), 'password' => $request->input('password')])) {
            $usuario = UserMetadata::where('user_id', Auth::id())->first();

            session(['user_metadata_id' => $usuario->id]);
            session(['perfil_id' => $usuario->perfil_id]);
            session(['perfil' => $usuario->perfil->nombre]);
            return redirect()->intended('/');
        } else {
            session()->flash('css', 'danger');
            session()->flash('mensaje', "Las credenciales indicadas no son válidas");
            return redirect()->route('acceso.login');
        }
    }
    public function registro()
    {
        return view('acceso.registro');
    }
    public function registro_post(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|min:6',
                'correo' => 'required|email:rfc,dns|unique:users,email',
                'telefono' => 'required',
                'direccion' => 'required',
                'password' => 'required|min:6|confirmed'
            ],
            [
                'nombre.required' => 'El campo Nombre está vacío',
                'nombre.min' => 'El campo Nombre debe tener al menos 6 caracteres',
                'correo.required' => 'El campo E-Mail está vacío',
                'correo.email' => 'El E-Mail ingresado no es válido',
                'correo.unique' => 'El E-Mail ingresado ya está siendo usado',
                'telefono.required' => 'El campo Teléfono está vacío',
                'direccion.required' => 'El campo Dirección está vacío',
                'password.required' => 'El campo Password está vacío',
                'password.min' => 'El campo Password debe tener al menos 6 caracteres',
                'password.required' => 'El campo Password está vacío',
                'password.min' => 'El campo Password debe tener al menos 6 caracteres',
                'password.confirmed' => 'Las contraseñas ingresadas no coiciden',
            ]
        );
        $user = User::create(
            [
                'name' => $request->input('nombre'),
                'email' => $request->input('correo'),
                'password' => Hash::make($request->input('password')),
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
        UserMetadata::create(
            [
                'user_id' => $user->id,
                'perfil_id' => 2,
                'telefono' => $request->input('telefono'),
                'direccion' => $request->input('direccion')
            ]
        );
        session()->flash('css', 'success');
        session()->flash('mensaje', "Se ha creado el registro exitosamente");
        return redirect()->route('acceso.registro');
    }
}
