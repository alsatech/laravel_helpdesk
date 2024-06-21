<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #880709, #9B2021, #AF3738, #C56061, #E29192 ); /* Fondo degradado */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-header h2 {
            margin-bottom: 10px;
            color: #59071A;
        }
        .login-header p {
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
        .footer-image {
            margin-top: auto;
            margin-bottom: 20px;
            width: 300px; /* Ajusta este valor según tus necesidades */
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Bienvenido</h2>
            <p>HELP DESK</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>
    </div>
    <img src="{{ asset('images/x.svg') }}" alt="Footer Image" class="footer-image">
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

