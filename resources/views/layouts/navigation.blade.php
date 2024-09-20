<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tareas.pendientes') }}" :class="{ 'active': request()->routeIs('tareas.pendientes') }">
                        Tareas Pendientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tareas.index') }}" :class="{ 'active': request()->routeIs('tareas.index') }">
                        Historial Tareas
                    </a>
                </li>
            </ul>

            <div class="d-flex">
                <!-- Split dropstart button -->
                <div class="btn-group dropstart">
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                Perfil
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    Cerrar Sesion
                                </a>
                            </form>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary">
                        {{ Auth::user()->name }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

