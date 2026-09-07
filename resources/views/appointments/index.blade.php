@extends('layouts.app')

@section('content')
    <div class="content-grid">

        <!-- COLUNA PRINCIPAL DA AGENDA -->
        <div>
            <!-- 1. KPIs Rápidos -->
            <div class="row" style="margin-left: -0.5rem; margin-right: -0.5rem;">
                <div class="col-md-6" style="padding: 0 0.5rem;">
                    <div class="kpi-card">
                        <div>
                            <div class="kpi-title">PACIENTES</div>
                            <div class="kpi-value">
                                {{ $totalPatients ?? 156 }}
                                <span class="kpi-trend-negative"><i class="bi bi-arrow-down-short"></i> 2% vs mês
                                    passado</span>
                            </div>
                        </div>
                        <div class="kpi-icon-container">
                            <i class="bi bi-people-fill fs-4"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="padding: 0 0.5rem;">
                    <div class="kpi-card">
                        <div>
                            <div class="kpi-title">CONSULTAS HOJE</div>
                            <div class="kpi-value">
                                {{ $totalTodayAppointments ?? 18 }}
                                <span class="kpi-trend-positive"><i class="bi bi-check2"></i> 6 concluídas</span>
                            </div>
                        </div>
                        <div class="kpi-icon-container">
                            <i class="bi bi-calendar-check-fill fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Barra de Navegação da Agenda -->
            <div class="agenda-toolbar d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center" style="gap: 0.75rem;">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-left"></i></button>
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-chevron-right"></i></button>
                    </div>
                    <div>
                        <div class="d-flex align-items-center" style="gap: 0.5rem;">
                            <h4 class="mb-0 font-weight-bold" style="font-size: 1.15rem;">
                                {{ now()->translatedFormat('l, d \\d\\e F') }}
                            </h4>
                            <span class="badge badge-success text-success"
                                style="background: #e6f7f0; font-weight: 600;">Hoje</span>
                        </div>
                        <small class="text-muted">Escala de Consultas Médicas do Dia</small>
                    </div>
                </div>

                <div class="d-flex align-items-center" style="gap: 0.75rem;">
                    <div class="filter-pill-group">
                        <button class="filter-pill-btn active">Dia</button>
                        <button class="filter-pill-btn">Semana</button>
                        <button class="filter-pill-btn">Mês</button>
                    </div>
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary-dark">
                        <i class="bi bi-plus-lg"></i> Nova consulta
                    </a>
                </div>
            </div>

            <!-- 3. Filtros Rápidos -->
            <div class="agenda-toolbar d-flex align-items-center justify-content-between mt-3 py-2">
                <div class="d-flex align-items-center" style="gap: 0.75rem;">
                    <span class="text-muted" style="font-size: 0.85rem;"><i class="bi bi-funnel"></i> Filtros:</span>
                    <select class="form-control form-control-sm" style="width: auto; border-radius: 8px;">
                        <option>Dra. Ana Lima (Clínica Geral)</option>
                    </select>
                    <select class="form-control form-control-sm" style="width: auto; border-radius: 8px;">
                        <option>Todas as Salas</option>
                    </select>
                </div>

                <div class="filter-pill-group">
                    <button class="filter-pill-btn active">Todas as Consultas</button>
                    <button class="filter-pill-btn">Agendadas (8)</button>
                    <button class="filter-pill-btn">Em Atendimento (1)</button>
                    <button class="filter-pill-btn">Concluídas (6)</button>
                </div>
            </div>

            <!-- 4. Grade de Horários -->
            <table class="schedule-table">
                <thead>
                    <tr style="background: #fafafa; font-size: 0.8rem; color: #64748b;">
                        <th style="width: 100px;">Horário</th>
                        <th><span style="color: #10b981;">●</span> Consultório 01 — Dra. Ana Lima <span
                                class="badge badge-light">8 consultas</span></th>
                        <th><span style="color: #10b981;">●</span> Consultório 02 — Dr. Roberto Dias <span
                                class="badge badge-light">7 consultas</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-weight-bold text-muted">08:00</td>
                        <td>
                            <div class="slot-appointment">
                                <div>
                                    <strong>08:00 - 08:30</strong> • Ana Costa
                                    <div style="font-size: 0.75rem; color: #64748b;">Consulta Médica • Concluída</div>
                                </div>
                                <span style="color: #10b981; font-size: 8px;">●</span>
                            </div>
                        </td>
                        <td>
                            <div class="slot-appointment">
                                <div>
                                    <strong>08:30 - 09:00</strong> • Lucas Lima
                                    <div style="font-size: 0.75rem; color: #64748b;">Consulta Médica • Concluída</div>
                                </div>
                                <span style="color: #10b981; font-size: 8px;">●</span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="font-weight-bold" style="color: #10b981;">14:00 • Agora</td>
                        <td>
                            <div class="slot-appointment" style="background: #e6f7f0; border-left-color: #043927;">
                                <div>
                                    <strong>14:00 - 14:30</strong> • Pedro Oliveira
                                    <span class="badge badge-success ml-2" style="background: #043927;">Em
                                        Atendimento</span>
                                    <div style="font-size: 0.75rem; color: #043927;">Consulta Médica (Recepção confirmada)
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><span class="slot-available">Disponível</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- PAINEL LATERAL DIREITO: LISTA DE PACIENTES DO DIA -->
        <aside class="right-panel">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h6 class="font-weight-bold mb-0" style="font-size: 0.95rem;">Lista de Pacientes</h6>
                <span class="badge" style="background: #e6f7f0; color: #00875a; font-weight: 600;">8 consultas hoje</span>
            </div>

            <div class="search-input-wrapper w-100 mb-3">
                <i class="bi bi-search search-icon"></i>
                <input type="text" placeholder="Filtrar pacientes do dia..."
                    style="font-size: 0.8rem; padding: 0.45rem 0.5rem 0.45rem 2.2rem;">
            </div>

            <div class="patient-list">
                @forelse($appointments ?? [] as $appointment)
                    <div class="patient-row-item">
                        <div class="d-flex align-items-center" style="gap: 0.75rem;">
                            <div class="avatar-badge" style="width: 34px; height: 34px; font-size: 0.75rem;">
                                {{ substr($appointment->patient->name, 0, 2) }}
                            </div>
                            <div>
                                <div style="font-size: 0.85rem; font-weight: 600;">{{ $appointment->patient->name }}</div>
                                <div style="font-size: 0.72rem; color: #64748b;">
                                    {{ $appointment->appointment_date->format('H:i') }} • Consulta Médica
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-link text-muted p-0"><i class="bi bi-three-dots-vertical"></i></button>
                    </div>
                @empty
                    <!-- Demonstração estática similar ao protótipo -->
                    <div class="patient-row-item active-item">
                        <div class="d-flex align-items-center" style="gap: 0.75rem;">
                            <div class="avatar-badge"
                                style="background: #043927; color: #fff; width: 34px; height: 34px; font-size: 0.75rem;">PO
                            </div>
                            <div>
                                <div style="font-size: 0.85rem; font-weight: 600;">Pedro Oliveira</div>
                                <div style="font-size: 0.72rem; color: #043927;">14:00 • Consulta Médica</div>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-link text-muted p-0"><i class="bi bi-three-dots"></i></button>
                    </div>
                @endforelse
            </div>

            <hr class="my-3">
            <a href="{{ route('patients.index') }}" class="d-block text-center text-decoration-none"
                style="color: #043927; font-size: 0.85rem; font-weight: 600;">
                Ver todos os pacientes <i class="bi bi-chevron-right"></i>
            </a>
        </aside>

    </div>
@endsection