@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Editar consulta</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                @csrf
                @method('PUT')

                @include('appointments.form')

                <a href="{{ route('appointments.index') }}" class="btn btn-light">
                    Cancelar
                </a>

                <button class="btn btn-primary">
                    Guardar alterações
                </button>
            </form>
        </div>
    </div>
@endsection
