@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Editar paciente</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('patients.update', $pacient) }}" method="POST">
                @csrf
                @method('PUT')

                @include('patients.form')

                <a href="{{ route('patients.index') }}" class="btn btn-light">
                    Cancelar
                </a>

                <button class="btn btn-primary">
                    Guardar alterações
                </button>
            </form>
        </div>
    </div>
@endsection
