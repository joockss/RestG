{{-- filepath: resources/views/reservas/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Listado de Reservas')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Listado de Reservas</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($reservas->isEmpty())
        <p class="text-center">No hay reservas registradas.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Mesa</th>
                    <th>Fecha y Hora</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id }}</td>
                        <td>{{ $reserva->cliente_nombre ?? 'Sin nombre' }}</td>
                        <td>{{ $reserva->mesa_id }}</td>
                        <td>{{ $reserva->fecha_hora }}</td>
                        <td>{{ $reserva->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
