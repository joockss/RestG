<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-semibold text-gray-800 hover:text-indigo-600">
                        🍽️ Restaurante
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        Inicio
                    </x-nav-link>

                    @auth
                        @if(auth()->user()->isAdmin())
                            <x-nav-link href="{{ route('mesas.index') }}" :active="request()->routeIs('mesas.*')">
                                Mesas
                            </x-nav-link>

                            <x-nav-link href="{{ route('reservas.index') }}" :active="request()->routeIs('reservas.index')">
                                Reservas
                            </x-nav-link>
                        @endif

                        <x-nav-link href="{{ route('reservas.create') }}" :active="request()->routeIs('reservas.create')">
                            Crear Reserva
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @guest
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Registrarse</a>
                    </div>
                @else
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>
                                <span class="ml-2 px-2 py-0.5 text-xs rounded-full bg-{{ Auth::user()->isAdmin() ? 'red' : 'blue' }}-500 text-white">
                                    {{ Auth::user()->role }}
                                </span>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 011.06 1.061l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    Cerrar Sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endguest
            </div>

            <!-- Hamburger for Mobile -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-indigo-600 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Inicio
            </x-responsive-nav-link>

            @auth
                @if(auth()->user()->isAdmin())
                    <x-responsive-nav-link href="{{ route('mesas.index') }}" :active="request()->routeIs('mesas.*')">
                        Mesas
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('reservas.index') }}" :active="request()->routeIs('reservas.index')">
                        Reservas
                    </x-responsive-nav-link>
                @endif

                <x-responsive-nav-link href="{{ route('reservas.create') }}" :active="request()->routeIs('reservas.create')">
                    Crear Reserva
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Auth Links -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @guest
                <div class="px-4 space-y-2">
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:text-indigo-600">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="block text-gray-700 hover:text-indigo-600">Registrarse</a>
                </div>
            @else
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            Cerrar Sesión
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>
