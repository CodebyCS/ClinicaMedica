<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ route('appointments.index') }}">
            Natimed
        </a>

        {{-- Menu para telemóvel. --}}
        <button class="navbar-toggler" type="button"
                data-toggle="collapse"
                data-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            @auth
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appointments.index') }}">
                            Consultas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('doctors.index') }}">
                            Médicos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('patients.index') }}">
                            Pacientes
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="navbar-text mr-3">
                            {{ Auth::user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Terminar sessão
                        </a>
                    </li>
                </ul>

                {{-- Logout no Laravel deve usar POST, não GET. --}}
                <form id="logout-form" action="{{ route('logout') }}"
                      method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
        </div>
    </div>
</nav>
