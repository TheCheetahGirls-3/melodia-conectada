<?php

use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\GeneroController;
use App\Http\Controllers\Api\InstrumentoController;
use App\Http\Controllers\Api\LocalController;
use App\Http\Controllers\Api\MultimediaController;
use App\Http\Controllers\Api\MusicoController;
use App\Http\Controllers\Api\TipoLocalController;
use App\Http\Controllers\Api\TipoMultimediaController;
use App\Http\Controllers\Api\TipoUsuarioController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->id_usuario;
});

Route::apiResource('cliente', ClienteController::class);
Route::get('cliente/{id}', [ClienteController::class, 'show']);
Route::apiResource('evento', EventoController::class);
Route::apiResource('genero', GeneroController::class);
Route::apiResource('instrumento', InstrumentoController::class);
Route::apiResource('local', LocalController::class);
Route::apiResource('multimedia', MultimediaController::class);
Route::apiResource('/musico', MusicoController::class);
Route::apiResource('tipo_local', TipoLocalController::class);
Route::apiResource('tipo_multimedia', TipoMultimediaController::class);
Route::apiResource('tipo_usuario', TipoUsuarioController::class);
Route::apiResource('/usuario', UsuarioController::class);

