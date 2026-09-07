@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Consultas</h1>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Nova consulta</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Data</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Especialidade</th>
                    <th class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->appointment_date->format('d/m/Y H:i') }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->doctor->specialty->name }}</td>
                        <td class="text-right">
                            <a class="btn btn-sm btn-outline-info"
                               href="{{ route('appointments.show', $appointment) }}">
                                Detalhe
                            </a>

                            <a class="btn btn-sm btn-outline-primary"
                               href="{{ route('appointments.edit', $appointment) }}">
                                Editar
                            </a>

                            <form class="d-inline"
                                  action="{{ route('appointments.destroy', $appointment) }}"
                                  method="POST"
                                  onsubmit="return confirm('Pretende remover esta consulta?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Não existem consultas registadas.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
