@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4">{{ $patient->name }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8">{{ $patient->email }}</dd>

                <dt class="col-sm-4">Número SNS</dt>
                <dd class="col-sm-8">{{ $patient->sns_number }}</dd>

                <dt class="col-sm-4">Data de nascimento</dt>
                <dd class="col-sm-8">{{ $patient->birth_date->format('d/m/Y') }}</dd>
            </dl>

            <hr>

            <h2 class="h5">Consultas deste paciente</h2>

            <ul class="mb-0">
                @forelse ($patient->appointments as $appointment)
                    <li>
                        {{ $appointment->appointment_date->format('d/m/Y H:i') }}
                        — Dr(a). {{ $appointment->doctor->name }}
                    </li>
                @empty
                    <li>Este paciente ainda não tem consultas.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
