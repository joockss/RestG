{{-- filepath: resources/views/reservas/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Listado de Reservas')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Listado de Reservas</h2>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulario de filtrado por rango de fechas --}}
    <form method="GET" action="{{ route('reservas.index') }}" class="row g-3 mb-4" id="formFiltroFechas">
        <div class="col-md-4">
            <label for="fecha_inicio" class="form-label">Desde</label>
            <input 
                type="date" 
                name="fecha_inicio" 
                id="fecha_inicio"
                value="{{ request('fecha_inicio') }}" 
                class="form-control"
            >
        </div>
        <div class="col-md-4">
            <label for="fecha_fin" class="form-label">Hasta</label>
            <input 
                type="date" 
                name="fecha_fin" 
                id="fecha_fin"
                value="{{ request('fecha_fin') }}" 
                class="form-control"
            >
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary me-2">Filtrar</button>
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Limpiar</a>
        </div>
    </form>

    <!-- Tabla de resultados -->
    @if ($reservas->isEmpty())
        <p class="text-center">No hay reservas registradas para el rango seleccionado.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Mesa</th>
                    <th>Detalles</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ $reserva->nombre_cliente ?? 'Sin nombre' }}</td>
                        <td>{{ $reserva->mesa_id }}</td>
                        <td>{{ $reserva->detalles }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

{{-- 🧠 Validación de fechas en el frontend --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fechaInicio = document.getElementById('fecha_inicio');
    const fechaFin = document.getElementById('fecha_fin');

    // Cuando cambia la fecha de inicio, actualiza el "min" de fecha_fin
    fechaInicio.addEventListener('change', function () {
        fechaFin.min = fechaInicio.value; // No se puede seleccionar una fecha menor
        if (fechaFin.value && fechaFin.value < fechaInicio.value) {
            fechaFin.value = fechaInicio.value; // Ajusta automáticamente si está mal
        }
    });

    // Previene enviar el formulario si la fecha_fin es menor a fecha_inicio
    document.getElementById('formFiltroFechas').addEventListener('submit', function (e) {
        if (fechaInicio.value && fechaFin.value && fechaFin.value < fechaInicio.value) {
            e.preventDefault();
            alert('La fecha final debe ser igual o posterior a la fecha de inicio.');
        }
    });
});
</script>
@endsection
