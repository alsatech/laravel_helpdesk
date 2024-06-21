<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        /* Estilos adicionales para el layout */
        body {
            background: linear-gradient(to right, #CECECE, #DDD2D2, #E3CFCF, #EAC9C9, #F1C2C2); /* Fondo degradado */
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            margin-top: 20px; /* Ajusta el margen superior según sea necesario */
        }
        .footer {
            margin-top: auto; /* Empuja el footer hacia abajo */
            margin-bottom: 1000px;
        }
        .footer img {
            height: 400px; /* Ajusta el tamaño de la imagen según tus necesidades */
        }
    </style>
</head>
<body>


    <div class="container mt-4">
        @yield('content') <!-- Esta sección se llenará con el contenido de las vistas -->
    </div>

    <div class="footer">
        <img src="{{ asset('images/siluetas.svg') }}" alt="Logo">
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
