@extends('layouts.app')

@section('title', 'Reservar Cliente')

@section('content')
<div class="container mt-5 ">
  <div class="card shadow-lg p-4">
    <h2 class="mb-4 text-center">🍽 Reservar Cliente</h2>
    <p class="text-muted text-center">Completa los datos para registrar una nueva reserva.</p>

    <form action="{{ route('reservas.store') }}" method="POST">
      @csrf

      <!-- Nombre del cliente -->
      <div class="mb-3">
        <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
        <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" required placeholder="Ej: Juan Pérez">
      </div>

      <!-- Mesa -->
      <div class="mb-3">
        <label for="mesa_id" class="form-label">Mesa</label>
        <select name="mesa_id" id="mesa_id" class="form-select" required>
          <option value="">Selecciona una mesa</option>
          @foreach($mesas as $mesa)
            <option value="{{ $mesa->id }}">Mesa #{{ $mesa->numero }} (Capacidad: {{ $mesa->capacidad }})</option>
          @endforeach
        </select>
      </div>

      <!-- Fecha y hora -->
      <div class="row">
        <div class="col-md-6 mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" 
                name="fecha" 
                id="fecha" 
                class="form-control" 
                required 
                min="{{ date('Y-m-d', strtotime('+1 day')) }}" 
                max="{{ date('Y-m-d', strtotime('+1 month')) }}">
            <small class="text-muted">Puedes reservar hasta con 1 mes de anticipación</small>
        </div>
        <div class="col-md-6 mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" required>
        </div>
     </div>

      <!-- Observaciones -->
      <div class="mb-3">
        <label for="observaciones" class="form-label">Detalles</label>
        <textarea name="observaciones" id="observaciones" class="form-control" rows="3" placeholder="Ej: Mesa cerca a la ventana"></textarea>
      </div>

      <!-- Botones -->
      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
      </div>
    </form>
  </div>
</div> 
@endsection
