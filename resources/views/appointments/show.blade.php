@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Detalhe da consulta</h1>

        <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-outline-primary">
            Editar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Data e hora</dt>
                <dd class="col-sm-8">{{ $appointment->appointment_date->format('d/m/Y H:i') }}</dd>

                <dt class="col-sm-4">Paciente</dt>
                <dd class="col-sm-8">{{ $appointment->patient->name }}</dd>

                <dt class="col-sm-4">Médico</dt>
                <dd class="col-sm-8">
                    {{ $appointment->doctor->name }}
                    — {{ $appointment->doctor->specialty->name }}
                </dd>

                <dt class="col-sm-4">Notas clínicas</dt>
                <dd class="col-sm-8">{{ $appointment->clinical_notes ?: 'Sem notas.' }}</dd>
            </dl>

            <hr>

            <h2 class="h5">Medicamentos prescritos</h2>

            <ul class="mb-0">
                @forelse ($appointment->medications as $medication)
                    <li>
                        <strong>{{ $medication->name }}</strong>
                        — {{ $medication->active_ingredient }}
                        ({{ $medication->laboratory->name }})
                    </li>
                @empty
                    <li>Não foram prescritos medicamentos nesta consulta.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
