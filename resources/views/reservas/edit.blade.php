@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')

{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Errores de validación!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

<div class="container mt-5 mb-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-center">✏️ Editar Reserva</h2>
        <p class="text-muted text-center">Modifica los datos de la reserva #{{ $reserva->id }}</p>

        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre del cliente -->
            <div class="mb-3">
                <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                <input type="text" 
                    name="nombre_cliente" 
                    id="nombre_cliente" 
                    class="form-control @error('nombre_cliente') is-invalid @enderror" 
                    required 
                    placeholder="Ej: Juan Pérez"
                    value="{{ old('nombre_cliente', $reserva->nombre_cliente) }}">
                @error('nombre_cliente')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mesa -->
            <div class="mb-3">
                <label for="mesa_id" class="form-label">Mesa</label>
                <select name="mesa_id" id="mesa_id" class="form-select @error('mesa_id') is-invalid @enderror" required>
                    <option value="">Selecciona una mesa</option>
                    @foreach($mesas as $mesa)
                        <option value="{{ $mesa->id }}" 
                            {{ old('mesa_id', $reserva->mesa_id) == $mesa->id ? 'selected' : '' }}>
                            Mesa #{{ $mesa->numero }} (Capacidad: {{ $mesa->capacidad }} personas) - {{ ucfirst($mesa->estado) }}
                        </option>
                    @endforeach
                </select>
                @error('mesa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha y hora -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha_hora" class="form-label">Fecha</label>
                    <input type="date" 
                        name="fecha_hora" 
                        id="fecha_hora" 
                        class="form-control @error('fecha_hora') is-invalid @enderror" 
                        required 
                        value="{{ old('fecha_hora', $reserva->fecha_hora->format('Y-m-d')) }}"
                        min="{{ now()->format('Y-m-d') }}" 
                        max="{{ now()->addMonth()->format('Y-m-d') }}">
                    <small class="text-muted">Puedes reservar hasta con 1 mes de anticipación</small>
                    @error('fecha_hora')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <select name="hora" id="hora" class="form-select @error('hora') is-invalid @enderror" required>
                        <option value="">Selecciona una hora</option>
                        <optgroup label="Almuerzo">
                            @foreach(range(10, 12) as $hour)
                                @foreach([0, 30] as $minute)
                                    @php
                                        $time = sprintf('%02d:%02d', $hour, $minute);
                                        if ($time <= '12:00') {
                                            $horaActual = old('hora', $reserva->fecha_hora->format('H:i'));
                                            $selected = $horaActual == $time ? 'selected' : '';
                                            echo "<option value=\"{$time}\" {$selected}>{$time}</option>";
                                        }
                                    @endphp
                                @endforeach
                            @endforeach
                        </optgroup>
                        <optgroup label="Cena">
                            @foreach(range(19, 20) as $hour)
                                @foreach([0, 30] as $minute)
                                    @php
                                        $time = sprintf('%02d:%02d', $hour, $minute);
                                        $horaActual = old('hora', $reserva->fecha_hora->format('H:i'));
                                        $selected = $horaActual == $time ? 'selected' : '';
                                        echo "<option value=\"{$time}\" {$selected}>{$time}</option>";
                                    @endphp
                                @endforeach
                            @endforeach
                        </optgroup>
                    </select>
                    <small class="text-muted">Horarios: 10:00-12:00 y 19:00-21:00</small>
                    @error('hora')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" 
                    name="telefono" 
                    id="telefono" 
                    class="form-control @error('telefono') is-invalid @enderror" 
                    placeholder="Ej: 987654321"
                    value="{{ old('telefono', $reserva->telefono) }}"
                    required
                    maxlength="9"
                    pattern="[0-9]{9}">
                <small class="text-muted">Ingresa 9 dígitos</small>
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Detalles -->
            <div class="mb-3">
                <label for="detalles" class="form-label">Detalles</label>
                <textarea 
                    name="detalles" 
                    id="detalles" 
                    class="form-control @error('detalles') is-invalid @enderror" 
                    rows="3" 
                    placeholder="Ej: Mesa cerca a la ventana"
                    maxlength="500">{{ old('detalles', $reserva->detalles) }}</textarea>
                <small class="text-muted">Opcional - Máximo 500 caracteres</small>
                @error('detalles')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Información adicional -->
            <div class="alert alert-info">
                <strong>ℹ️ Información:</strong>
                <ul class="mb-0 mt-2">
                    <li>Reserva creada: {{ $reserva->created_at->format('d/m/Y H:i') }}</li>
                    <li>Última actualización: {{ $reserva->updated_at->format('d/m/Y H:i') }}</li>
                </ul>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('reservas.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Actualizar Reserva
                </button>
            </div>
        </form>
    </div>
</div>
@endsection