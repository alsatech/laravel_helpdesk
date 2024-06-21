@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Generar Reporte de Órdenes Finalizadas</h2>
        
        <!-- Botón para generar el reporte en PDF -->
        <a href="{{ route('export.pdf') }}" class="btn btn-primary">Generar Reporte PDF</a>

        <canvas id="ordenesPorEmpleadoChart" width="400" height="200"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('ordenesPorEmpleadoChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($empleados) !!},
                    datasets: [{
                        label: 'Órdenes Finalizadas',
                        data: {!! json_encode($cantidades) !!},
                        backgroundColor: 'rgba(241, 194, 194)',
                        borderColor: 'rgba(127, 40, 41)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {}
                    }
                }
            });
        });
    </script>
@endsection
