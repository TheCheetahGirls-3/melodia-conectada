<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Musico;
use App\Models\Instrumento;
use App\Models\Genero;
use App\Models\TipoLocal;
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
        $usuario = Usuario::with([
            'clientes',
            'clientes.musicos.instrumentos',
            'clientes.musicos.generos',
            'clientes.locales.tipo_local'
        ])->find($id);

        $instrumentos = Instrumento::all();
        $generos = Genero::all();
        $tipos_local = TipoLocal::all();

        return view('editarperfil', [
            'usuario' => $usuario,
            'instrumentos' => $instrumentos,
            'generos' => $generos,
            'tipos_local' => $tipos_local,
        ]);
    }

    public function actualizarPerfil(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'nombre_artistico' => 'nullable|string',
            'id_instrumento' => 'required|exists:instrumentos,id_instrumento',
            'id_genero' => 'required|exists:generos,id_genero',
            'foto_perfil' => 'nullable|image',
        ]);

        $usuario = Usuario::findOrFail($request->id_usuario);
        $cliente = $usuario->clientes;

        $cliente->nombre = $request->nombre;
        $cliente->descripcion = $request->descripcion;
        $cliente->telefono = $request->telefono;

        if ($request->hasFile('foto_perfil')) {
            $foto = $request->file('foto_perfil');
            $path = $foto->store('public/perfiles');
            $cliente->foto_perfil = basename($path);
        }

        $cliente->save();

        $musico = $cliente->musicos;

        if ($musico) {
            $musico->nombre_artistico = $request->nombre_artistico;
            $musico->save();

            $musico->instrumentos()->sync([$request->id_instrumento]);
            $musico->generos()->sync([$request->id_genero]);
        }

        return response()->json([
            'message' => 'Perfil actualizado correctamente.',
            'usuario' => $usuario
        ]);
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
