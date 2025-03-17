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

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $contrasenya = $request->input('contrasenya');

        $user = Usuario::where('username', $username)->first();

        if ($user != null && Hash::check($contrasenya, $user->contrasenya)){
            Auth::login($user);
            $response = redirect('/home');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
