<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <title>ChillGig · Register</title>
</head>
<body>
    <div class="container-fluid centered">
        <div class="registerDiv">
            <div class="center">
                <img src="{{asset('images/logo_chillgig.png')}}" alt="logo2">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
            <div class="center">
                <p>Elige quien eres</p>
                <button class="roleButton btn btn-secondary rounded-4">
                    <img class="roleIcon" src="images/icono_musico.png" alt="icono de músico">
                </button>
                <button class="roleButton btn btn-secondary rounded-4">
                    <img class="roleIcon" src="images/icono_local.png" alt="icono de local">
                </button>
            </div>
            <div class="center">
                <a href="{{ url('/pag') }}"><button class="btn btn-primary rounded-pill p-2 m-2 buttonWidth" type="submit">Siguiente</button></a>
                <p>¿Ya tienes cuenta? <a href="{{ url('/login') }}">Inicia sesión</a></p>
            </div>
        </div>
    </div>
</body>
</html>
