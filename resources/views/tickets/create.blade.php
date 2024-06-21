
@extends('layouts.ticket')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Orden</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="form-container">
        <div class="header-text">
            <h2>Crear Orden</h2>
        </div>
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('tickets.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="oficio">Oficio</label>
                        <input type="text" name="oficio" id="oficio" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="numero_empleado">Número de Empleado</label>
                        <input type="text" name="numero_empleado" id="numero_empleado" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="dependencia">Dependencia</label>
                        <input type="text" name="dependencia" id="dependencia" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="departamento">Departamento</label>
                        <input type="text" name="departamento" id="departamento" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="puesto">Puesto</label>
                        <select name="puesto" id="puesto" class="form-control" onchange="updatePrioridad()" required>
                            <option value="">Seleccione un puesto</option>
                            <option value="empleado">Empleado</option>
                            <option value="jefe_area">Jefe de Área</option>
                            <option value="regidor">Regidor</option>
                            <option value="director">Director</option>
                            <option value="presidente">Presidente</option>
                            <option value="coordinador_administrativo">Coordinador Administrativo</option>
                            <option value="secretario_ayuntamiento">Secretario de Ayuntamiento</option>
                            <option value="secretario_particular">Secretario Particular</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="responsable">Responsable</label>
                        <select name="responsable[]" id="responsable" class="form-control" multiple required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="prioridad">Prioridad</label>
                        <select name="prioridad" id="prioridad" class="form-control" required>
                            <option value="minima">Minima</option>
                            <option value="normal">Normal</option>
                            <option value="urgente">Urgente</option>
                            <option value="inmediata">Inmediata/Maxima</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nombre_solicitante">Nombre del Solicitante</label>
                        <input type="text" name="nombre_solicitante" id="nombre_solicitante" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">Crear Orden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        function updatePrioridad() {
            const puesto = document.getElementById('puesto').value;
            const prioridad = document.getElementById('prioridad');

            switch (puesto) {
                case 'empleado':
                    prioridad.value = 'minima';
                    break;
                case 'jefe_area':
                    prioridad.value = 'normal';
                    break;
                case 'regidor':
                case 'director':
                case 'coordinador_administrativo':
                    prioridad.value = 'urgente';
                    break;
                case 'presidente':
                case 'secretario_ayuntamiento':
                case 'secretario_particular':
                    prioridad.value = 'inmediata';
                    break;
                default:
                    prioridad.value = '';
            }
        }
    </script>
</body>
</html>
