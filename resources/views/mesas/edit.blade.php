@extends('layouts.app')

@section('title', 'Editar Estado de Mesa')

@section('content')
<div class="container mb-5">
    <h2>Editar Estado de la Mesa</h2>
    <p class="mb-5"><strong>Número de Mesa:</strong> {{ $mesa->numero }}</p>
    
         @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> Por favor corrige los siguientes errores:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mesas.update', $mesa->id) }}" method="POST" style="max-width: 500px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="libre" {{ $mesa->estado == 'libre' ? 'selected' : '' }}>Libre</option>
                <option value="reservado" {{ $mesa->estado == 'reservada' ? 'selected' : '' }}>Reservada</option>
                <option value="ocupado" {{ $mesa->estado == 'ocupada' ? 'selected' : '' }}>Ocupada</option>
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" 
                   type="checkbox" 
                   name="reservable" 
                   id="reservable" 
                   value="1" 
                   {{ $mesa->reservable ? 'checked' : '' }}>
            <label class="form-check-label" for="reservable">
                Reservable
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Actualizar Estado</button>
    </form>
</div>
@endsection