<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <title>ChillGig</title>

</head>
<body id="backgroundImg">
    <div id="introDiv">
        <div id="introContentDiv" class="centered">
            <div id="logoDiv" class="center">
                <img src="{{asset('images/logo_rojo.png')}}" alt="logo1">
                <img src="{{asset('images/logo_chillgig.png')}}" alt="logo2">
            </div>
            <div id="textPart">
                <h1 class="mt-5 mb-4">Sello de autenticidad para cada show</h1>
                <p class="mt-5">Chillgig conecta a músicos con espacios que buscan telento en vivo. Ya no
                    necesitas esperar a que el público te descubra, ¡tú llevas la música a donde más se disfruta!
                </p>
                <a href="{{ url('/login') }}"><button class="btn btn-primary rounded-pill p-2 m-2 mt-5 buttonWidth">Iniciar Sesión</button></a>
                <a href="{{ url('/signin') }}"><button class="btn bg-white rounded-pill p-2 m-2 mt-5 whiteButton buttonWidth">Registrarse</button></a>
            </div>
        </div>
    </div>
    <img id="imagenPortada" src="{{asset('images/imagen_portada.png')}}" alt="imagen de fondo la portada">

</body>
</html>
