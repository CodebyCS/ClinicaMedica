@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Pacientes</h1>
        <a href="{{ route('patients.create') }}" class="btn btn-primary">Novo paciente</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Número SNS</th>
                    <th>Data de nascimento</th>
                    <th class="text-right">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->sns_number }}</td>
                        <td>{{ $patient->birth_date->format('d/m/Y') }}</td>
                        <td class="text-right">
                            <a class="btn btn-sm btn-outline-info"
                               href="{{ route('patients.show', $patient) }}">Ver</a>

                            <a class="btn btn-sm btn-outline-primary"
                               href="{{ route('patients.edit', $patient) }}">Editar</a>

                            <form class="d-inline"
                                  action="{{ route('patients.destroy', $patient) }}"
                                  method="POST"
                                  onsubmit="return confirm('Pretende remover este paciente?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Não existem pacientes registados.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
