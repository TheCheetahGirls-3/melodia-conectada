@extends('layouts.principal')

@section('title')
    NavBar
@endsection

@section('content')
    <header>
        <nav class="col-12 navbar navbar-expand-lg bg-body-secondary p-0 navbar-principal fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand ms-3 p-3" href="{{ url('/index') }}">
                    <img src="{{ asset('/images/logo_chillgig.png') }}" width="150">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-5">
                            <a class="nav-link active p-4 ps-4 pe-4" aria-current="page"
                                href="{{ url('/index') }}">Inicio</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link p-4" aria-current="page" href="{{ url('/chat') }}">Chat</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link p-4" aria-current="page" href="{{ url('/perfil') }}">Perfil</a>
                        </li>
                    </ul>
                    <div class="d-flex" role="search">
                        <ul class="navbar-nav" me-auto mb-2 mb.lg-0>
                            @if (Auth::check())
                                @php
                                    $usuario = Auth::user(); // Guardar el usuario autenticado en una variable
                                @endphp
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->correo }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/logout') }}"><i
                                                class="bi bi-box-arrow-right" aria-hidden="true"></i>
                                            Logout</a>
                                        <form
                                            action="{{ action([App\Http\Controllers\UsuarioController::class, 'destroy'], ['usuario' => $usuario->id_usuario]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="bi bi-trash3 text-danger"></i>
                                                Eliminar perfil
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/signin') }}"><i class="fa fa-sign-in"
                                            aria-hidden="true"></i>
                                        Signin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/login') }}"><i class="fa fa-sign-in"
                                            aria-hidden="true"></i>
                                        Login</a>
                                </li>
                        </ul>
                        @endif
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <div>
        @yield('contenido')
    </div>

    <nav class="navbar navbar-expand-lg bg-body-secondary navbar-movil fixed-bottom">
        <div class="container d-flex justify-content-center">
            <ul class="d-flex gap-3" style="list-style: none">
                <li class="">
                    <a class="nav-link me-5" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="">
                    <a class="nav-link me-5" aria-current="page" href="#">Chat</a>
                </li>
                <li class="">
                    <a class="nav-link me-5" aria-current="page" href="#">Perfil</a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- <script src="js/scriptInicio.js"></script> --}}
@endsection
