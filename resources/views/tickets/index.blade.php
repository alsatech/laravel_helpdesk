<!-- resources/views/tickets/index.blade.php -->
@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <div class="container">
        <h2>Ordenes</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Orden</th>
                    <th>Estatus</th>
                    <th>Dependencia</th>
                    <th>Solicitante</th>
                    <th>Puesto</th>
                    <th>Fecha Recepcion</th>
                    <th>Procesar</th>
                    <th>Finalizar</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->oficio }}</td>
                        <td>
                            @php
                                $orden = \App\Models\Orden::where('oficio', $ticket->oficio)->first();
                                $estado = $orden ? $orden->estatus : 'Pendiente';
                            @endphp
                            {{ $estado }}
                        </td>
                        <td>{{ $ticket->dependencia }}</td>
                        <td>{{ $ticket->nombre_solicitante }}</td>
                        <td>{{ $ticket->puesto }}</td>
                        <td>{{ $ticket->created_at }}</td>
                        <td>
                            <!-- Icono para abrir el modal -->
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modal{{$ticket->id}}">
                                <i class="fas fa-cogs"></i> <!-- Icono de engranaje (puedes cambiarlo según tu preferencia) -->
                            </button>
                        </td>
                        <td>
                            <!-- Botón de finalizar orden -->
                            @if($estado != 'F')
                                <button type="button" class="btn btn-success btn-sm" onclick="finalizeOrder({{ $ticket->id }})">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            @else
                                <i class="fas fa-check-circle text-success"></i>
                            @endif
                        </td>
                    </tr>
                    <!-- Modal para cada ticket -->
                    <div class="modal fade" id="modal{{$ticket->id}}" tabindex="-1" aria-labelledby="modal{{$ticket->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal{{$ticket->id}}Label">Detalles del Oficio {{ $ticket->oficio }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID:</strong> {{ $ticket->id }}</p>
                                    <p><strong>Num Empleado:</strong> {{ $ticket->numero_empleado }}</p>
                                    <p><strong>Orden:</strong> {{ $ticket->oficio }}</p>
                                    <p><strong>Estatus:</strong> {{ isset($ticket->estado) ? $ticket->estado : 'Pendiente' }}</p>
                                    <p><strong>Responsable:</strong> {{ $ticket->responsable }}</p>
                                    <p><strong>Dependencia:</strong> {{ $ticket->dependencia }}</p>
                                    <p><strong>Solicitante:</strong> {{ $ticket->nombre_solicitante }}</p>
                                    <p><strong>Fecha:</strong> {{ $ticket->created_at }}</p>
                                    <p><strong>Problema:</strong> {{ $ticket->descripcion }}</p>
                                    <!-- AGREGAR NUM DE EMPLEADO Y PROBLEMA O DESCRIPCION  -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('tickets.addSolution', ['id' => $ticket->id]) }}'">Agregar solución</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function finalizeOrder(ticketId) {
            fetch(`/tickets/${ticketId}/finalize`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ estatus: 'F' })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>

    
@endsection
