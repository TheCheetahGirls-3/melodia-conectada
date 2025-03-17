@extends('layouts.principal')

@section('contenido')
<div class="offset-lg-3 col-lg-6 mt-5">
    {{-- @include('partials.mensajes') --}}
    <div class="card">
        <div class="card-header bg-secondary text-light">
                Login
        </div>
        <div class="card-body">
            <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="correu" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" autofocus
                        value="{{ old('username') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="contrasenya" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="contrasenya" name="contrasenya"
                        value="{{ old('contrasenya') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12 d-flex flex-row-reverse">
                        <a href="{{ url('/') }}" class="btn btn-secondary float-right ms-1"><i class="fa fa-times"
                            aria-hidden="true"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary float-right"><i class="fa fs-check"
                            aria-hidden="true"></i>
                            Aceptar
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
