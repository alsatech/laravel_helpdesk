<!-- resources/views/tickets/add-solution.blade.php -->
@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Agregar Solución para la Orden {{ $ticket->oficio }}</h2>

        <!-- Formulario para agregar la solución -->
        <form method="POST" action="{{ route('tickets.storeSolution', ['id' => $ticket->id]) }}">
            @csrf
            <div class="form-group mb-3">
                <label for="solucion">Solución</label>
                <textarea name="solucion" id="solucion" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Solución</button>
        </form>
    </div>

@endsection
