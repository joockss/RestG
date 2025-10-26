@extends('layouts.app')

@section('content')
<div class="container text-center mt-5 mb-5">
  <h2 class="mb-4">📖 Nuestra Carta</h2>

  <div class="card-container mx-auto" style="width: 300px; height: 400px; perspective: 1000px;">
    <div class="card-flip">
      <!-- Lado frontal -->
      <div class="card-front shadow-lg rounded-4">
        <img src="{{ asset('images/carta_portada.jpg') }}" 
             alt="Portada de la carta" 
             class="img-fluid rounded-4" 
             style="width: 100%; height: 100%; object-fit: cover;">
      </div>

      <!-- Lado trasero -->
      <div class="card-back shadow-lg rounded-4 bg-light d-flex align-items-center justify-content-center p-3">
        <div>
          <h5 class="fw-bold mb-3">🍽️ Explora nuestros sabores</h5>
          <p class="text-muted">Aquí podrás encontrar los platos más representativos de nuestro restaurante.</p>
          <a href="{{ asset('images/carta_menu.jpg') }}" target="_blank" class="btn btn-primary mt-3">
            Ver carta completa
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Estilos -->
<style>
.card-container {
  position: relative;
}

.card-flip {
  width: 100%;
  height: 100%;
  transition: transform 0.8s;
  transform-style: preserve-3d;
  cursor: pointer;
  position: relative;
}

.card-container:hover .card-flip {
  transform: rotateY(180deg);
}

.card-front, .card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  border-radius: 20px;
}

.card-back {
  transform: rotateY(180deg);
}
</style>
@endsection
