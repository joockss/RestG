@extends('layouts.app')

@section('content')
<div class="container mb-5">
  <h2>🪑 Mesas</h2>
  <a href="{{ route('mesas.create') }}" class="btn btn-primary mb-3">Nueva mesa</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Numero</th>
        <th>Capacidad</th>
        <th>Estado</th>
        <th>Acciones</th>
        <th>Reservable</th>
      </tr>
    </thead>
    <tbody>
      @foreach($mesas as $m)
        <tr>
          <td>{{ $m->id }}</td>
          <td>{{ $m->numero }}</td>
          <td>{{ $m->capacidad }}</td>
          <td>
            <span class="badge 
              @if($m->estado == 'libre') bg-success
              @elseif($m->estado == 'ocupado') bg-dark
              @elseif($m->estado == 'reservado') bg-secondary
              @else bg-secondary @endif">
              {{ ucfirst($m->estado) }}
            </span>
          </td>
          <td>
            <div class="d-flex gap-2">
              <a href="{{ route('mesas.edit', $m->id) }}" class="btn btn-sm btn-warning">Editar</a>
              <form action="{{ route('mesas.destroy', $m->id) }}" method="POST" onsubmit="return confirm('¿Eliminar mesa?');">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </div>
          </td>
            <td>
          @if($m->reservable)
            <span class="badge bg-success">Sí</span>
          @else
            <span class="badge bg-danger">No</span>
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
  </table>
</div>
@endsection