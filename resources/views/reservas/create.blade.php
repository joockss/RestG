        @extends('layouts.app')

        @section('title', 'Reservar Cliente')

        @section('content')

                {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>¡Errores!</strong>
                    <ul class="mb-0">
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
            <h2 class="mb-4 text-center">🍽 Reservar Cliente</h2>
            <p class="text-muted text-center">Completa los datos para registrar una nueva reserva.</p>

            <form action="{{ route('reservas.store') }}" method="POST">
              @csrf

              <!-- Nombre del cliente -->
              <div class="mb-3">
                <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                <input type="text" 
                    name="nombre_cliente" 
                    id="nombre_cliente" 
                    class="form-control" 
                    required 
                    placeholder="Ej: Juan Pérez"
                    value="{{ old('nombre_cliente') }}">
              </div>

              <!-- Mesa -->
              <div class="mb-3">
                <label for="mesa_id" class="form-label">Mesa</label>
                <select name="mesa_id" id="mesa_id" class="form-select" required>
                  <option value="">Selecciona una mesa</option>
                  @foreach($mesas as $mesa)
                    <option value="{{ $mesa->id }}" {{ old('mesa_id') == $mesa->id ? 'selected' : '' }}>
                      Mesa #{{ $mesa->numero }} (Capacidad: {{ $mesa->capacidad }} personas)
                    </option>
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
                        class="form-control @error('fecha') is-invalid @enderror" 
                        required 
                        value="{{ old('fecha') }}"
                        min="{{ now()->addDay()->format('Y-m-d') }}" 
                        max="{{ now()->addMonth()->format('Y-m-d') }}">
                    <small class="text-muted">Puedes reservar hasta con 1 mes de anticipación</small>
                    @error('fecha')
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
                                            $selected = old('hora') == $time ? 'selected' : '';
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
                                        $selected = old('hora') == $time ? 'selected' : '';
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
                    class="form-control" 
                    placeholder="Ej: 987654321"
                    value="{{ old('telefono') }}"
                    required>
              </div>

              <!-- Detalles -->
              <div class="mb-3">
                <label for="detalles" class="form-label">Detalles</label>
                <textarea 
                    name="detalles" 
                    id="detalles" 
                    class="form-control" 
                    rows="3" 
                    placeholder="Ej: Mesa cerca a la ventana"
                    maxlength="500">{{ old('detalles') }}</textarea>
                <small class="text-muted">Opcional - Máximo 500 caracteres</small>
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