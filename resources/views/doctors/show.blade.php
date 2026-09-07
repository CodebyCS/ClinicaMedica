@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">{{ $doctor->name }}</h1>

        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-outline-primary">
            Editar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-4">Cédula profissional</dt>
                <dd class="col-sm-8">{{ $doctor->license_number }}</dd>

                <dt class="col-sm-4">Especialidade</dt>
                <dd class="col-sm-8">{{ $doctor->specialty->name }}</dd>

                <dt class="col-sm-4">Número de consultas</dt>
                <dd class="col-sm-8">{{ $doctor->appointments->count() }}</dd>
            </dl>
        </div>
    </div>

    <a href="{{ route('doctors.index') }}" class="btn btn-link px-0 mt-3">
        ← Voltar aos médicos
    </a>
@endsection
