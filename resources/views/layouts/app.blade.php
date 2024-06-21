<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        /* Estilos adicionales para el layout */
        body {
            background: linear-gradient(to right, #880709, #9B2021, #AF3738, #C56061, #E29192); /* Fondo degradado */
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .navbar-brand img {
            height: 60px; /* Ajusta el tamaño de la imagen según tus necesidades */
            margin-right: 10px;
        }
        .container {
            margin-top: 20px; /* Ajusta el margen superior según sea necesario */
        }
        .footer {
            margin-top: auto; /* Empuja el footer hacia abajo */
            margin-bottom: 1000px;
        }
        .footer img {
            height: 100px; /* Ajusta el tamaño de la imagen según tus necesidades */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/nopales.svg') }}" alt="Logo">
                Regresar
            </a>
            <!-- Aquí podrías agregar elementos de navegación si lo deseas -->
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content') <!-- Esta sección se llenará con el contenido de las vistas -->
    </div>

    <div class="footer">
        <img src="{{ asset('images/x.svg') }}" alt="Logo">
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
