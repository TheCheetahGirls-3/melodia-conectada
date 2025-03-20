<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <title>
        @yield('title')
    </title>
</head>
<body>
    <header>
        <nav class="col-12 navbar navbar-expand-lg bg-body-secondary p-0 navbar-principal fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand ms-3 p-3" href="{{ url('/index') }}">
                    <img src="{{asset('/images/logo_chillgig.png')}}" width="150">
                </a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item ms-5">
                    <a class="nav-link active p-4 ps-4 pe-4" aria-current="page" href="{{ url('/index') }}">Inicio</a>
                  </li>
                  <li class="nav-item ms-5">
                    <a class="nav-link p-4" aria-current="page" href="{{ url('/chat') }}">Chat</a>
                  </li>
                  <li class="nav-item ms-5">
                    <a class="nav-link p-4" aria-current="page" href="{{ url('/perfil') }}">Perfil</a>
                  </li>
                </ul>

              </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        @yield('content')
        {{-- <ejemplo></ejemplo> --}}
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

    <script src="js/scriptInicio.js"></script>

</body>
</html>
