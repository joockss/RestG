{{-- filepath: resources/views/mesas/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Crear Mesa')

@section('content')
    <div class="container mb-5">
        <h2 class="mb-4 text-center">Crear Nueva Mesa</h2>

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

        <form action="{{ route('mesas.store') }}" method="POST" class="mx-auto" style="max-width: 500px;">
            @csrf
            
            <div class="mb-3">
                <label for="numero" class="form-label">Número de Mesa</label>
                <input type="text" name="numero" id="numero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="capacidad" class="form-label">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="">Selecciona un estado</option>
                    <option value="libre" selected>Libre</option>
                    <option value="reservada">Reservada</option>
                    <option value="ocupada">Ocupada</option>
                </select>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="reservable" id="reservable" value="1" checked>
                <label class="form-check-label" for="reservable">
                    ¿Es reservable?
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Crear Mesa</button>
        </form>
    </div>
@endsection