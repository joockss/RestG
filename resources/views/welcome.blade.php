@extends('layouts.app')

@section('title', 'Inicio - Restaurante')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center mb-5">
            <h1 class="display-4 mb-3">🍽️ Bienvenido a Nuestro Restaurante</h1>
            <p class="lead text-muted">Disfruta de la mejor experiencia gastronómica</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <!-- Card Mesas -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-table" style="font-size: 3rem; color: #313131;"></i>
                    </div>
                    <h3 class="h4 mb-3">Gestión de Mesas</h3>
                    <p class="text-muted mb-4">Administra las mesas del restaurante</p>
                    <a href="{{ route('mesas.index') }}" class="btn btn-dark btn-lg w-100">Ver Mesas</a>
                </div>
            </div>
        </div>

        <!-- Card Reservas -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-calendar-check" style="font-size: 3rem; color: #313131;"></i>
                    </div>
                    <h3 class="h4 mb-3">Ver Reservas</h3>
                    <p class="text-muted mb-4">Consulta todas las reservas realizadas</p>
                    <a href="{{ route('reservas.index') }}" class="btn btn-dark btn-lg w-100">Ver Reservas</a>
                </div>
            </div>
        </div>

        <!-- Card Hacer Reserva -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0" style="background: linear-gradient(135deg, #313131 0%, #666 100%);">
                <div class="card-body text-center p-4 text-white">
                    <div class="mb-3">
                        <i class="bi bi-plus-circle" style="font-size: 3rem;"></i>
                    </div>
                    <h3 class="h4 mb-3">Hacer Reserva</h3>
                    <p class="mb-4" style="color: rgba(255,255,255,0.8);">Reserva tu mesa ahora</p>
                    <a href="{{ route('reservas.create') }}" class="btn btn-light btn-lg w-100">Reservar Ahora</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección adicional -->
    <div class="row mt-5">
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="h3 mb-4">Horarios de Atención</h2>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5><i class="bi bi-clock text-muted"></i> Lunes a Viernes</h5>
                            <p class="text-muted mb-0">9:00 AM - 10:00 PM</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5><i class="bi bi-clock text-muted"></i> Fines de Semana</h5>
                            <p class="text-muted mb-0">9:00 AM - 11:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection