<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Natimed — Gestão Clínica</title>

    <!-- Ícones (Bootstrap Icons ou FontAwesome) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Compilado do Projeto e o CSS Customizado -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    <div class="dashboard-wrapper">

        <!-- 1. SIDEBAR LATERAL ESQUERDA -->
        <aside class="sidebar">
            <div>
                <a href="{{ route('appointments.index') }}" class="sidebar-logo">
                    <div class="logo-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>
                    <span>Natimed</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span><i class="bi bi-house mr-2"></i> Início</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('appointments.index') }}"
                            class="nav-link {{ request()->routeIs('appointments.*') ? 'active' : '' }}">
                            <span><i class="bi bi-calendar3 mr-2"></i> Agenda</span>
                            @if(request()->routeIs('appointments.*'))
                                <span class="active-dot"></span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patients.index') }}"
                            class="nav-link {{ request()->routeIs('patients.*') ? 'active' : '' }}">
                            <span><i class="bi bi-people mr-2"></i> Pacientes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span><i class="bi bi-file-earmark-medical mr-2"></i> Prontuários</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span><i class="bi bi-gear mr-2"></i> Configurações</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Utilizador conectado no rodapé da Sidebar -->
            <div class="sidebar-user">
                <div class="avatar-badge">MS</div>
                <div class="user-meta" style="flex: 1; min-width: 0;">
                    <div style="font-size: 0.85rem; font-weight: 600; color: #fff;">Mariana Santos</div>
                    <div style="font-size: 0.72rem; color: #a7f3d0;"><i class="bi bi-circle-fill text-success"
                            style="font-size: 6px;"></i> Recepção • Online</div>
                </div>
                <i class="bi bi-chevron-down text-muted" style="font-size: 0.8rem;"></i>
            </div>
        </aside>

        <!-- 2. CONTEÚDO PRINCIPAL -->
        <div class="main-content">

            <!-- TOPBAR -->
            <header class="topbar">
                <div class="search-input-wrapper">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" placeholder="Buscar pacientes, consultas médicas, prontuários...">
                    <span class="shortcut-badge">⌘K</span>
                </div>

                <div class="d-flex align-items-center" style="gap: 1.25rem;">
                    <button class="btn btn-link text-secondary p-0 position-relative">
                        <i class="bi bi-bell fs-5"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    </button>

                    <div class="d-flex align-items-center" style="gap: 0.6rem;">
                        <div class="avatar-badge" style="background: #e6f4ea; color: #1e7e34;">AL</div>
                        <div>
                            <div style="font-size: 0.85rem; font-weight: 600;">Dra. Ana Lima</div>
                            <div style="font-size: 0.72rem; color: #64748b;">Clínica Geral</div>
                        </div>
                        <i class="bi bi-chevron-down" style="font-size: 0.75rem; color: #94a3b8;"></i>
                    </div>
                </div>
            </header>

            <!-- Renderiza a view filha -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts do Laravel/Bootstrap -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>