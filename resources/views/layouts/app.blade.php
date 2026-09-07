<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Proteção necessária nos formulários Laravel. --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Natimed — Gestão Clínica</title>

    {{-- Ficheiros compilados pelo comando npm run dev. --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-light">
<div id="app">

    {{-- Inclui o cabeçalho em todas as páginas. --}}
    @include('includes.header')

    <main class="py-4">
        <div class="container">

            {{-- Mensagens depois de criar, editar ou apagar registos. --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            {{-- Cada página coloca aqui o seu conteúdo. --}}
            @yield('content')
        </div>
    </main>

    {{-- Inclui o rodapé em todas as páginas. --}}
    @include('includes.footer')
</div>
</body>
</html>
