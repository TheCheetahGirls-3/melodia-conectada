<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('portada');
});

Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::get('/logout', [UsuarioController::class, 'logout']);

Route::get('/signin', [UsuarioController::class, 'create']);
Route::post('/signin', [UsuarioController::class, 'store']);

Route::delete('/usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

Route::get('/signin-ubicacion', function () {
    return view('layouts/signin-ubicacion');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/index', function () {
        $user = Auth::user();

        return view('home', compact('user'));
    });
});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('/pruebaFiltro', function () {
    return view('pruebaFiltro');
});



Route::get('/perfil', function () {
    return view('perfilpropio');
})->middleware('auth')->name('perfilpropio');

Route::get('/perfil/{id}', function ($id) {
    return view('perfilotros', ['id' => $id]);
})->name('perfilotros');


Route::get('/musico', function () {
    return view('index');
});

Route::get('/local', function () {
    return view('index');
});

Route::get('/editarperfil/{id}', [UsuarioController::class, 'editarPerfil']);
Route::post('/api/actualizar-perfil', [UsuarioController::class, 'actualizarPerfil']);

Route::get('/nuevoevento/{id}', [EventoController::class, 'crearEvento']);
Route::post('/api/crear-evento', [EventoController::class, 'crearEvento']);

Route::get('/evento/{id}', [EventoController::class, 'evento']);
