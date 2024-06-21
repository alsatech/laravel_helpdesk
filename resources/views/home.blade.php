@extends('layouts.home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link" style="font-size: 1.5rem;">Bienvenido, {{ Auth::user()->name }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="p-4 w-100">
            <h1 class="text-center">Bienvenido al sistema de Help Desk</h1>
        </div>
        <!-- Menú centrado -->
        <div class="bg-maroon text-white p-3 rounded">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('tickets.index') }}">Ordenes</a>
                </li>
                <li class="nav-item mb-2">
                    @if(auth()->check() && auth()->user()->id === 2)
                        <a class="nav-link text-white" href="{{ route('tickets.create') }}">Agregar Orden</a>
                    @endif
                </li>
                <!-- <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#">Registro de Usuario</a>
                </li> -->
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="#">Ver Usuarios</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('reports.create') }}">Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
@endsection
