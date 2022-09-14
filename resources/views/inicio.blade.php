<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">
        <link href="{{ asset('css/inicio.css') }}" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@400;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/modo.css') }}" rel="stylesheet">
        <script src="{{ asset('js/modo.js') }}"type="text/javascript" defer></script> 
        <title>INSTITUTO BELEN</title>

    </head>
    <body class="antialiased">
    <div class="contenedor">
    
   <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-warning" role="button">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-success" role="button">Iniciar Sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-warning" role="button">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
            <header>
            <h4>Modo Claro/Oscuro</h4>
             <label class="switch">
            <input type="checkbox" id="slider" checked>
            <span class="slider"></span>
              </label>
            </header>

               
        </div>
        <img src="{{ asset('img/belen-portada.png') }}" alt="front page" width="full"
                             class="logo">
        

    </body>
</html>