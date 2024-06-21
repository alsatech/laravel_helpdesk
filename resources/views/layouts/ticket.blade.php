<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>

        body {
            background: linear-gradient(to left, #880709, #9B2021, #AF3738, #C56061, #E29192); /* Fondo degradado */
            display: flex;
            justify-content: top;
            align-items: top;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1000px;
        }
        .header-text {
            text-align: center;
            margin-bottom: 20px;
        }
        .header-text h2 {
            margin-bottom: 10px;
            color: #59071A;
        }
        .header-text p {
            color: #59071A;
        }
        .form-group label {
            color: #6a1b9a;
        }
        .btn-primary {
            background-color: #59071A;
            border-color: #4a148c;
        }
        .btn-primary:hover {
            background-color: #38006b;
            border-color: #38006b;
        }
        .btn-custom {
            background-color: #59071A; /* Color guinda oscuro */
            border-color: #59071A;
            color: white;
        }
        .btn-custom:hover {
            background-color: #38006b; /* Color morado oscuro */
            border-color: #38006b;
        }
        .card {
            margin-top: 20px; /* Ajuste para centrar mejor el contenido */
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Regresar</a>
            <!-- Aquí podrías agregar elementos de navegación si lo deseas -->
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content') <!-- Esta sección se llenará con el contenido de las vistas -->
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
