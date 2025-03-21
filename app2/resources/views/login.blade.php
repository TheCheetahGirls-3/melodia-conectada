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
    <div class="container-fluid centeredPage">
        <div class="registerDiv">
            <img src="{{asset('images/logo_chillgig.png')}}" alt="logo2">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
            <a href="{{ url('/pag') }}"><button class="btn btn-primary rounded-pill p-2 m-2 buttonWidth" type="submit">Entrar</button></a>
            <p>¿No tienes cuenta? Regístrate</p>
        </div>
    </div>
</body>
</html>
