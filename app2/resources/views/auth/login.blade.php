<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <title>ChillGig · Login</title>
</head>

<body>
    <div class="container-fluid centered">
        <div class="registerDiv">
            <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="POST">
                @csrf
                <div class="center">
                    <img class="registerLogo" src="{{asset('images/logo_chillgig.png')}}" alt="logo2">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com" autofocus
                    value="{{ old('correo') }}">
                </div>
                <label for="contrasenya" class="form-label">Password</label>
                <input type="password" id="contrasenya" class="form-control" name="contrasenya" aria-describedby="passwordHelpBlock" value="{{ old('contrasenya') }}">
                <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary rounded-pill p-2 m-2 mt-5 buttonWidth center">Entrar</button>
                    <p>¿No tienes cuenta?<a class="ms-2" href="{{ url('/signin') }}">Regístrate</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

{{-- @section('contenido')
<div class="offset-lg-3 col-lg-6 mt-5">
    {{-- @include('partials.mensajes') --}}
    {{-- <div class="card">
        <div class="card-header bg-secondary text-light">
                Login
        </div>
        <div class="card-body">
            <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="correo" name="correo" autofocus
                        value="{{ old('correo') }}">
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

</div> --}}
{{--
@endsection --}}
