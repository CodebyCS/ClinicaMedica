@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Médicos</h1>

        <a href="{{ route('doctors.create') }}" class="btn btn-primary">
            Novo médico
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Nome</th>
                    <th>Cédula profissional</th>
                    <th>Especialidade</th>
                    <th class="text-right">Ações</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->license_number }}</td>
                        <td>{{ $doctor->specialty->name }}</td>

                        <td class="text-right">
                            <a href="{{ route('doctors.show', $doctor) }}"
                               class="btn btn-sm btn-outline-info">
                                Ver
                            </a>

                            <a href="{{ route('doctors.edit', $doctor) }}"
                               class="btn btn-sm btn-outline-primary">
                                Editar
                            </a>

                            <form action="{{ route('doctors.destroy', $doctor) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Pretende remover este médico?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger">
                                    Remover
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Não existem médicos registados.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
