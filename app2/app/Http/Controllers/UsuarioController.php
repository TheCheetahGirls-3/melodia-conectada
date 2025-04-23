<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function showLogin()
    {

        // $usuario = new Usuario();

        // $usuario->correo = 'vpoglo@mail.com';
        // $usuario->contrasenya = \bcrypt('pepe');
        // $usuario->id_tipo_usuario = 1;

        // $usuario->save();

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $correo = $request->input('correo');
        $contrasenya = $request->input('contrasenya');

        $user = Usuario::where('correo', $correo)->first();

        if ($user != null && Hash::check($contrasenya, $user->contrasenya)){
            Auth::login($user);
            $response = redirect('/index');
        }else {
            $request->session()->flash('error', 'usuario o contraseña incorrecta');
            $response = redirect('/login')->withInput();
        }

        return $response;
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.signin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->correo = $request->input('correo');
        $usuario->contrasenya = \bcrypt($request->input('contrasenya'));
        $usuario->id_tipo_usuario = $request->input('btnradio');

        $usuario->save();
        Auth::login($usuario);
        // $response = redirect('/login');
        $response = redirect('/signin-ubicacion');

        return $response;
    }

    public function editarPerfil($id) {
        $usuario = Usuario::with(['clientes', 'clientes.musicos.instrumentos', 'clientes.musicos.generos', 'clientes.locales.tipo_local'])
                    ->find($id);

        if (!$usuario) {
            return view('editarperfil')->with('usuario', null);
        }

        return view('editarperfil')->with('usuario', $usuario);
    }


    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {

        $usuario->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Usuario eliminado correctamente');
    }
}
