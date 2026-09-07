@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Nova Consulta</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf

                @include('appointments.form')

                <a href="{{ route('appointments.index') }}" class="btn btn-light">
                    Cancelar
                </a>

                <button class="btn btn-primary">
                    Guardar Consulta
                </button>
            </form>
        </div>
    </div>
@endsection
