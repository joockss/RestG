{{-- filepath: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'CarnitasBEEF - Restaurante')</title>
  <meta name="description" content="Disfruta de la mejor experiencia gastronómica en CarnitasBEEF">
  <meta name="keywords" content="restaurante, carnitas, beef, comida, lima, peru">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    /* Variables de color */
    :root {
      --primary-color: #d4442e;
      --secondary-color: #2c1810;
      --accent-color: #f8b739;
      --text-dark: #2c1810;
      --text-light: #6c757d;
    }

    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-dark);
    }

    /* Header mejorado */
    #header {
      background: rgba(255, 255, 255, 0.98);
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      padding: 15px 0;
    }

    #header.scrolled {
      background: rgba(255, 255, 255, 1);
      box-shadow: 0 2px 30px rgba(0, 0, 0, 0.15);
      padding: 10px 0;
    }

    /* Logo mejorado */
    .logo h1.sitename {
      font-family: 'Playfair Display', serif;
      color: var(--primary-color);
      font-weight: 700;
      margin: 0;
      font-size: 28px;
      transition: all 0.3s;
    }

    .logo:hover h1.sitename {
      color: var(--secondary-color);
    }

    /* Navegación mejorada */
    .navmenu ul {
      display: flex;
      align-items: center;
      gap: 5px;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .navmenu ul li {
      position: relative;
    }

    .navmenu ul li a {
      color: var(--text-dark);
      font-weight: 500;
      transition: all 0.3s;
      padding: 10px 16px;
      border-radius: 8px;
      text-decoration: none;
      display: block;
    }

    .navmenu ul li a:hover,
    .navmenu ul li a.active {
      color: var(--primary-color);
      background: rgba(212, 68, 46, 0.1);
    }

    /* Dropdown mejorado */
    .navmenu .dropdown > a {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .navmenu .dropdown ul {
      display: none;
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      background: white;
      box-shadow: 0 5px 25px rgba(0,0,0,0.15);
      border-radius: 12px;
      padding: 10px 0;
      min-width: 200px;
      z-index: 1000;
      list-style: none;
      margin: 0;
    }

    .navmenu .dropdown:hover > ul {
      display: block;
    }

    .navmenu .dropdown ul li {
      padding: 0;
    }

    .navmenu .dropdown ul li a,
    .navmenu .dropdown ul li button {
      padding: 12px 20px;
      display: block;
      width: 100%;
      text-align: left;
      border: none;
      background: transparent;
      color: var(--text-dark);
      transition: all 0.3s;
    }

    .navmenu .dropdown ul li a:hover,
    .navmenu .dropdown ul li button:hover {
      background: rgba(212, 68, 46, 0.1);
      color: var(--primary-color);
    }

    /* WhatsApp Float Button */
    .whatsapp-float {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: #25d366;
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
      box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
      z-index: 1000;
      transition: all 0.3s;
      text-decoration: none;
    }

    .whatsapp-float:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
      color: white;
    }

    /* Footer mejorado */
    .footer {
      background: linear-gradient(135deg, #2c1810, #4a3228);
      color: white;
      padding: 60px 0 20px;
    }

    .footer h4 {
      color: white;
      margin-bottom: 20px;
      font-weight: 600;
      font-size: 1.2rem;
    }

    .footer a {
      color: rgba(255, 255, 255, 0.7);
      transition: all 0.3s;
      text-decoration: none;
    }

    .footer a:hover {
      color: white;
      padding-left: 5px;
    }

    .footer-about p {
      color: rgba(255, 255, 255, 0.7);
      line-height: 1.8;
    }

    .footer-links ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links ul li {
      margin-bottom: 10px;
    }

    .footer-links ul li a {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .footer-links ul li a::before {
      content: '→';
      transition: transform 0.3s;
    }

    .footer-links ul li a:hover::before {
      transform: translateX(5px);
    }

    .footer-contact p {
      color: rgba(255, 255, 255, 0.7);
      line-height: 2;
      margin-bottom: 8px;
    }

    .footer-contact strong {
      color: white;
    }

    .social-links a {
      width: 45px;
      height: 45px;
      background: rgba(255, 255, 255, 0.1);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      margin-right: 10px;
      font-size: 1.2rem;
      transition: all 0.3s;
    }

    .social-links a:hover {
      background: var(--primary-color);
      transform: translateY(-3px);
      color: white;
    }

    .copyright {
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding-top: 30px;
      margin-top: 40px;
    }

    .copyright p {
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 10px;
    }

    .copyright .sitename {
      color: white;
    }

    .copyright .credits {
      color: rgba(255, 255, 255, 0.5);
    }

    /* Scroll Top Button */
    .scroll-top {
      position: fixed;
      bottom: 100px;
      right: 30px;
      background: var(--primary-color);
      color: white;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      display: none;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      transition: all 0.3s;
      z-index: 999;
      cursor: pointer;
    }

    .scroll-top:hover {
      background: var(--secondary-color);
      transform: translateY(-3px);
    }

    .scroll-top.active {
      display: flex;
    }

    /* Preloader mejorado */
    #preloader {
      position: fixed;
      inset: 0;
      z-index: 9999;
      overflow: hidden;
      background: var(--secondary-color);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #preloader:before {
      content: "";
      width: 50px;
      height: 50px;
      border: 5px solid rgba(255, 255, 255, 0.2);
      border-top-color: var(--primary-color);
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Mobile Navigation Toggle */
    .mobile-nav-toggle {
      font-size: 28px;
      cursor: pointer;
      color: var(--text-dark);
      transition: all 0.3s;
    }

    .mobile-nav-toggle:hover {
      color: var(--primary-color);
    }

    /* Responsive */
    @media (max-width: 1200px) {
      .navmenu ul {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    /* Agregar estos estilos en el <style> de tu app.blade.php */

/* Hero Section */
.hero-section {
  position: relative;
  min-height: 600px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Overlay oscuro para mejorar legibilidad */
.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5); /* Overlay oscuro al 50% */
  z-index: 1;
}

/* Contenido del hero */
.hero-section .container {
  position: relative;
  z-index: 2;
}

/* Títulos principales */
.hero-section h1,
.hero-section h2,
.hero-section .display-1,
.hero-section .display-2 {
  color: #ffffff !important;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
  font-weight: 700;
}

/* Texto descriptivo */
.hero-section p,
.hero-section .lead {
  color: #ffffff !important;
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
  font-size: 1.2rem;
}

/* Botones en el hero */
.hero-section .btn {
  font-weight: 600;
  padding: 12px 35px;
  font-size: 1.1rem;
  border-radius: 50px;
  transition: all 0.3s ease;
  text-shadow: none;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.hero-section .btn-primary {
  background: var(--primary-color);
  border: 2px solid var(--primary-color);
  color: white;
}

.hero-section .btn-primary:hover {
  background: transparent;
  border: 2px solid white;
  color: white;
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
}

.hero-section .btn-outline-light {
  border: 2px solid white;
  color: white;
  background: transparent;
}

.hero-section .btn-outline-light:hover {
  background: white;
  color: var(--primary-color);
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4);
}

/* Animación de entrada */
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

.hero-section .container > * {
  animation: fadeInUp 0.8s ease-out;
}

/* Responsive */
@media (max-width: 768px) {
  .hero-section {
    min-height: 500px;
  }
  
  .hero-section h1,
  .hero-section .display-1 {
    font-size: 2.5rem !important;
  }
  
  .hero-section p {
    font-size: 1rem;
  }
  
  .hero-section .btn {
    padding: 10px 25px;
    font-size: 1rem;
  }
}
/* Hero Section */
.hero-section {
  position: relative;
  min-height: 600px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Overlay oscuro para mejorar legibilidad */
.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5); /* Overlay oscuro al 50% */
  z-index: 1;
}

/* Contenido del hero */
.hero-section .container {
  position: relative;
  z-index: 2;
}

/* Títulos principales */
.hero-section h1,
.hero-section h2,
.hero-section .display-1,
.hero-section .display-2 {
  color: #ffffff !important;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
  font-weight: 700;
}

/* Texto descriptivo */
.hero-section p,
.hero-section .lead {
  color: #ffffff !important;
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
  font-size: 1.2rem;
}

/* Botones en el hero */
.hero-section .btn {
  font-weight: 600;
  padding: 12px 35px;
  font-size: 1.1rem;
  border-radius: 50px;
  transition: all 0.3s ease;
  text-shadow: none;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.hero-section .btn-primary {
  background: var(--primary-color);
  border: 2px solid var(--primary-color);
  color: white;
}

.hero-section .btn-primary:hover {
  background: transparent;
  border: 2px solid white;
  color: white;
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
}

.hero-section .btn-outline-light {
  border: 2px solid white;
  color: white;
  background: transparent;
}

.hero-section .btn-outline-light:hover {
  background: white;
  color: var(--primary-color);
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4);
}

/* Animación de entrada */
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

.hero-section .container > * {
  animation: fadeInUp 0.8s ease-out;
}

/* Sección de Horarios de Atención */
.horarios-section,
.schedule-section,
.opening-hours {
  background: linear-gradient(135deg, #2c1810, #4a3228);
  padding: 80px 0;
}

.horarios-section h2,
.horarios-section h3,
.schedule-section h2,
.schedule-section h3,
.opening-hours h2,
.opening-hours h3 {
  color: #ffffff !important;
  font-weight: 700;
  margin-bottom: 10px;
}

.horarios-section p,
.schedule-section p,
.opening-hours p {
  color: rgba(255, 255, 255, 0.8) !important;
  font-size: 1.1rem;
}

/* Cards de horarios */
.horarios-card,
.schedule-card {
  background: rgba(255, 255, 255, 0.1) !important;
  border: 1px solid rgba(255, 255, 255, 0.2) !important;
  border-radius: 15px;
  padding: 40px 30px;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.horarios-card:hover,
.schedule-card:hover {
  background: rgba(255, 255, 255, 0.15) !important;
  border-color: var(--primary-color) !important;
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.horarios-card h4,
.horarios-card h5,
.schedule-card h4,
.schedule-card h5 {
  color: #ffffff !important;
  font-weight: 600;
  margin: 20px 0 10px;
  font-size: 1.5rem;
}

.horarios-card p,
.schedule-card p {
  color: rgba(255, 255, 255, 0.9) !important;
  font-size: 1.2rem;
  font-weight: 500;
}

/* Iconos en cards de horarios */
.horarios-card i,
.schedule-card i {
  color: var(--accent-color);
  font-size: 3rem;
  margin-bottom: 20px;
}

/* Botón de reservar en sección de horarios */
.horarios-section .btn,
.schedule-section .btn {
  background: var(--primary-color);
  color: white;
  border: 2px solid var(--primary-color);
  padding: 15px 40px;
  font-size: 1.1rem;
  font-weight: 600;
  border-radius: 50px;
  transition: all 0.3s ease;
  margin-top: 30px;
}

.horarios-section .btn:hover,
.schedule-section .btn:hover {
  background: transparent;
  border-color: white;
  color: white;
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

/* Responsive */
@media (max-width: 768px) {
  .hero-section {
    min-height: 500px;
  }
  
  .hero-section h1,
  .hero-section .display-1 {
    font-size: 2.5rem !important;
  }
  
  .hero-section p {
    font-size: 1rem;
  }
  
  .hero-section .btn {
    padding: 10px 25px;
    font-size: 1rem;
  }
  
  .horarios-section,
  .schedule-section {
    padding: 60px 0;
  }
  
  .horarios-card,
  .schedule-card {
    margin-bottom: 20px;
  }
}
  </style>

  @stack('styles')
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="index-page">

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <h1 class="sitename">🥩 CarnitasBEEF</h1>
      </a>
      
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a></li>

          @auth
            @if(auth()->user()->isAdmin())
              <li><a href="{{ route('mesas.index') }}">Mesas</a></li>
              <li><a href="{{ route('reservas.index') }}">Reservas</a></li>
            @endif

            <li><a href="{{ route('reservas.create') }}">Nueva Reserva</a></li>
            
            <li class="dropdown">
              <a href="#">
                <span>{{ Auth::user()->name }}</span>
                <i class="bi bi-chevron-down toggle-dropdown"></i>
              </a>
              <ul>
                <li>
                  <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="dropdown-item bg-transparent border-0 text-start">
                      <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            <li><a href="{{ route('register') }}">Registrarse</a></li>
          @endauth
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <main class="main" style="margin-top: 100px;">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer id="footer" class="footer dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center mb-3">
            <span class="sitename">🥩 CarnitasBEEF</span>
          </a>
          <p>El mejor sabor de las carnitas y beef en Lima. Tradición, calidad y pasión en cada platillo que preparamos para ti y tu familia.</p>
          <div class="social-links d-flex mt-4">
            <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer" title="Twitter">
              <i class="bi bi-twitter-x"></i>
            </a>
            <a href="https://www.facebook.com/diego.letich?locale=es_LA" target="_blank" rel="noopener noreferrer" title="Facebook">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="https://www.instagram.com/justinstevensly/" target="_blank" rel="noopener noreferrer" title="Instagram">
              <i class="bi bi-instagram"></i>
            </a>
            <a href="https://www.linkedin.com/in/josuenoacenteno/" target="_blank" rel="noopener noreferrer" title="LinkedIn">
              <i class="bi bi-linkedin"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Enlaces útiles</h4>
          <ul>
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ route('mesas.index') }}">Mesas</a></li>
            <li><a href="{{ route('reservas.index') }}">Reservas</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Servicios</h4>
          <ul>
            <li><a href="{{ route('reservas.create') }}">Reservas</a></li>
            <li><a href="#">Pedidos</a></li>
            <li><a href="#">Atención</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-contact">
          <h4>Contáctanos</h4>
          <p>
            <i class="bi bi-geo-alt me-2"></i>Av. Tupac Amaru<br>
            <span style="margin-left: 28px;">Lima, Perú</span>
          </p>
          <p>
            <i class="bi bi-telephone me-2"></i><strong>Teléfono:</strong> 
            <a href="tel:+51914860659">+51 914 860 659</a>
          </p>
          <p>
            <i class="bi bi-envelope me-2"></i><strong>Email:</strong> 
            <a href="mailto:JQuispeCasas@Carnitasbeef.com">JQuispeCasas@Carnitasbeef.com</a>
          </p>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© {{ date('Y') }} <strong class="px-1 sitename">CarnitasBEEF</strong> - Todos los derechos reservados</p>
      <div class="credits">
        Hecho con <i class="bi bi-heart-fill" style="color: #d4442e;"></i> en Lima, Perú
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- WhatsApp Float Button -->
  <a href="https://wa.me/51914860659?text=Hola,%20me%20gustaría%20hacer%20una%20consulta" 
     class="whatsapp-float" 
     target="_blank" 
     title="Contáctanos por WhatsApp">
    <i class="bi bi-whatsapp"></i>
  </a>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    // Header scroll effect
    window.addEventListener('scroll', function() {
      const header = document.getElementById('header');
      const scrollTop = document.getElementById('scroll-top');
      
      if (window.scrollY > 100) {
        header.classList.add('scrolled');
        if (scrollTop) scrollTop.classList.add('active');
      } else {
        header.classList.remove('scrolled');
        if (scrollTop) scrollTop.classList.remove('active');
      }
    });

    // Scroll to top functionality
    const scrollTopBtn = document.getElementById('scroll-top');
    if (scrollTopBtn) {
      scrollTopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    }

    // Initialize AOS
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 1000,
        once: true,
        offset: 100
      });
    }

    // Preloader
    window.addEventListener('load', function() {
      const preloader = document.getElementById('preloader');
      if (preloader) {
        preloader.style.display = 'none';
      }
    });
  </script>

  @stack('scripts')
</body>
</html>