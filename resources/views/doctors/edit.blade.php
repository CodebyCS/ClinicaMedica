@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">Editar médico</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('doctors.update', $doctor) }}" method="POST">
                @csrf
                @method('PUT')

                @include('doctors.form')

                <a href="{{ route('doctors.index') }}" class="btn btn-light">
                    Cancelar
                </a>

                <button class="btn btn-primary">
                    Guardar alterações
                </button>
            </form>
        </div>
    </div>
@endsection
