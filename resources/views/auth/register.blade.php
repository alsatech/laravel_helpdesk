<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #880709, #9B2021, #AF3738, #C56061, #E29192); /* Fondo degradado */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .register-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .register-header h2 {
            margin-bottom: 10px;
            color: #59071A;
        }
        .register-header p {
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
            background-color: #BD0832;
            border-color: #38006b;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h2>Bienvenido</h2>
            <p>HELP DESK</p>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
