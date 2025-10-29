{{-- filepath: resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Inicio - CarnitasBEEF')

@push('styles')
<style>
  /* Hero Section */
  .hero-section {
    background: linear-gradient(rgba(44, 24, 16, 0.7), rgba(44, 24, 16, 0.7)), 
                url('https://images.unsplash.com/photo-1544025162-d76694265947?w=1200') center/cover;
    min-height: 90vh;
    display: flex;
    align-items: center;
    color: white;
    padding-top: 100px;
  }

  .hero-content h1 {
    font-family: 'Playfair Display', serif;
    font-size: 4rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    animation: fadeInUp 1s ease;
  }

  .hero-content p {
    font-size: 1.4rem;
    margin-bottom: 2rem;
    opacity: 0.95;
    animation: fadeInUp 1s ease 0.2s both;
  }

  .hero-buttons {
    animation: fadeInUp 1s ease 0.4s both;
  }

  .btn-hero {
    padding: 15px 40px;
    font-size: 1.1rem;
    border-radius: 30px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s;
    margin: 10px;
  }

  .btn-primary-hero {
    background: #d4442e;
    color: white;
    border: 2px solid #d4442e;
  }

  .btn-primary-hero:hover {
    background: #b83a26;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(212, 68, 46, 0.4);
    color: white;
  }

  .btn-outline-hero {
    border: 2px solid white;
    color: white;
    background: transparent;
  }

  .btn-outline-hero:hover {
    background: white;
    color: #2c1810;
  }

  /* Especialidades Section */
  .especialidades-section {
    padding: 100px 0;
    background: #f8f9fa;
  }

  .section-title {
    text-align: center;
    margin-bottom: 60px;
  }

  .section-title h2 {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    color: #2c1810;
    margin-bottom: 15px;
  }

  .section-title p {
    color: #6c757d;
    font-size: 1.1rem;
  }

  .plato-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.4s;
    height: 100%;
  }

  .plato-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
  }

  .plato-card-img {
    position: relative;
    overflow: hidden;
    height: 280px;
  }

  .plato-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
  }

  .plato-card:hover .plato-card-img img {
    transform: scale(1.1);
  }

  .plato-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #d4442e;
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    z-index: 2;
  }

  .plato-info {
    padding: 25px;
  }

  .plato-info h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    color: #2c1810;
    margin-bottom: 10px;
  }

  .plato-info p {
    color: #6c757d;
    margin-bottom: 15px;
    line-height: 1.6;
  }

  .plato-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .plato-precio {
    font-size: 1.8rem;
    color: #d4442e;
    font-weight: 700;
  }

  .btn-ver-mas {
    background: #f8f9fa;
    color: #2c1810;
    padding: 8px 20px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s;
  }

  .btn-ver-mas:hover {
    background: #d4442e;
    color: white;
  }

  /* Galería Section */
  .galeria-section {
    padding: 100px 0;
    background: white;
  }

  .galeria-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
  }

  .galeria-item {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    height: 300px;
    cursor: pointer;
  }

  .galeria-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
  }

  .galeria-item:hover img {
    transform: scale(1.1);
  }

  .galeria-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(44, 24, 16, 0.8), transparent);
    display: flex;
    align-items: flex-end;
    padding: 20px;
    color: white;
    opacity: 0;
    transition: opacity 0.3s;
  }

  .galeria-item:hover .galeria-overlay {
    opacity: 1;
  }

  /* Horarios Section */
  .horarios-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #2c1810, #4a3228);
    color: white;
  }

  .horario-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 40px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s;
  }

  .horario-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.15);
  }

  .horario-card i {
    font-size: 3rem;
    color: #f8b739;
    margin-bottom: 20px;
  }

  .horario-card h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
  }

  .horario-card p {
    font-size: 1.2rem;
    opacity: 0.9;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 mx-auto text-center">
        <div class="hero-content">
          <h1>El Auténtico Sabor<br>de las Carnitas</h1>
          <p>Tradición, calidad y sabor en cada bocado. Descubre por qué somos el restaurante favorito de Lima.</p>
          <div class="hero-buttons">
            <a href="#menu" class="btn-hero btn-primary-hero">
              <i class="bi bi-card-list me-2"></i>Ver Menú
            </a>
            <a href="{{ route('reservas.create') }}" class="btn-hero btn-outline-hero">
              <i class="bi bi-calendar-check me-2"></i>Reservar Mesa
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Especialidades Section -->
<section id="menu" class="especialidades-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Nuestras Especialidades</h2>
      <p>Platillos preparados con los mejores ingredientes y mucho amor</p>
    </div>

    <div class="row g-4">
      <!-- Plato 1: Carnitas Especiales -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="plato-card">
          <div class="plato-card-img">
            <span class="plato-badge">Especialidad</span>
            <img src="https://images.unsplash.com/photo-1598103442097-8b74394b95c6?w=500" alt="Carnitas Especiales">
          </div>
          <div class="plato-info">
            <h3>Carnitas Especiales</h3>
            <p>Carne de cerdo cocida lentamente con especias secretas. Servida con tortillas frescas y guarniciones.</p>
            <div class="plato-footer">
              <span class="plato-precio">S/ 35.00</span>
              <a href="{{ route('reservas.create') }}" class="btn-ver-mas">Ordenar</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Plato 2: Beef Steak Premium -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="plato-card">
          <div class="plato-card-img">
            <span class="plato-badge">Premium</span>
            <img src="https://images.unsplash.com/photo-1600891964092-4316c288032e?w=500" alt="Beef Steak Premium">
          </div>
          <div class="plato-info">
            <h3>Beef Steak Premium</h3>
            <p>Corte premium de res, término al gusto, acompañado de papas rústicas y vegetales al grill.</p>
            <div class="plato-footer">
              <span class="plato-precio">S/ 45.00</span>
              <a href="{{ route('reservas.create') }}" class="btn-ver-mas">Ordenar</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Plato 3: Tacos de Carnitas -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="plato-card">
          <div class="plato-card-img">
            <span class="plato-badge">Popular</span>
            <img src="https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=500" alt="Tacos de Carnitas">
          </div>
          <div class="plato-info">
            <h3>Tacos de Carnitas</h3>
            <p>5 tacos dorados con carnitas, cebolla, cilantro y nuestras salsas artesanales especiales.</p>
            <div class="plato-footer">
              <span class="plato-precio">S/ 28.00</span>
              <a href="{{ route('reservas.create') }}" class="btn-ver-mas">Ordenar</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Plato 4: Parrillada Mixta -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="plato-card">
          <div class="plato-card-img">
            <span class="plato-badge">Para Compartir</span>
            <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=500" alt="Parrillada Mixta">
          </div>
          <div class="plato-info">
            <h3>Parrillada Mixta</h3>
            <p>Combinación de carnes a la parrilla: res, cerdo y pollo. Ideal para compartir en familia.</p>
            <div class="plato-footer">
              <span class="plato-precio">S/ 65.00</span>
              <a href="{{ route('reservas.create') }}" class="btn-ver-mas">Ordenar</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Plato 5: Burrito Gigante -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="plato-card">
          <div class="plato-card-img">
            <img src="https://images.unsplash.com/photo-1626700051175-6818013e1d4f?w=500" alt="Burrito Gigante">
          </div>
          <div class="plato-info">
            <h3>Burrito Gigante</h3>
            <p>Tortilla rellena de carnitas, arroz, frijoles, queso y pico de gallo. ¡Enorme y delicioso!</p>
            <div class="plato-footer">
              <span class="plato-precio">S/ 32.00</span>
              <a href="{{ route('reservas.create') }}" class="btn-ver-mas">Ordenar</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Plato 6: Costillas BBQ -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="plato-card">
          <div class="plato-card-img">
            <span class="plato-badge">Chef's Special</span>
            <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=500" alt="Costillas BBQ">
          </div>
          <div class="plato-info">
            <h3>Costillas BBQ</h3>
            <p>Costillas de cerdo bañadas en nuestra salsa BBQ casera, cocidas a fuego lento por 8 horas.</p>
            <div class="plato-footer">
              <span class="plato-precio">S/ 42.00</span>
              <a href="{{ route('reservas.create') }}" class="btn-ver-mas">Ordenar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Galería del Restaurante -->
<section id="nosotros" class="galeria-section">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Nuestro Restaurante</h2>
      <p>Un ambiente acogedor para disfrutar con los tuyos</p>
    </div>

    <div class="galeria-grid">
      <div class="galeria-item" data-aos="zoom-in" data-aos-delay="100">
        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=500" alt="Interior del restaurante">
        <div class="galeria-overlay">
          <h4>Ambiente Acogedor</h4>
        </div>
      </div>

      <div class="galeria-item" data-aos="zoom-in" data-aos-delay="200">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=500" alt="Mesa preparada">
        <div class="galeria-overlay">
          <h4>Atención Personalizada</h4>
        </div>
      </div>

      <div class="galeria-item" data-aos="zoom-in" data-aos-delay="300">
        <img src="https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?w=500" alt="Cocina">
        <div class="galeria-overlay">
          <h4>Cocina Profesional</h4>
        </div>
      </div>

      <div class="galeria-item" data-aos="zoom-in" data-aos-delay="400">
        <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=500" alt="Bar">
        <div class="galeria-overlay">
          <h4>Bar & Bebidas</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Horarios Section -->
<section class="horarios-section">
  <div class="container">
    <div class="section-title text-white" data-aos="fade-up">
      <h2>Horarios de Atención</h2>
      <p>Estamos listos para atenderte</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="horario-card">
          <i class="bi bi-calendar-week"></i>
          <h3>Lunes a Viernes</h3>
          <p>9:00 AM - 10:00 PM</p>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left">
        <div class="horario-card">
          <i class="bi bi-calendar-event"></i>
          <h3>Fines de Semana</h3>
          <p>9:00 AM - 11:00 PM</p>
        </div>
      </div>
    </div>

    <div class="text-center mt-5" data-aos="fade-up">
      <a href="{{ route('reservas.create') }}" class="btn-hero btn-outline-hero">
        <i class="bi bi-calendar-check me-2"></i>Reservar Ahora
      </a>
    </div>
  </div>
</section>

@endsection