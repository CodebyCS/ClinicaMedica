@php
    // Valor correto para o campo datetime-local.
    $dateValue = old(
        'appointment_date',
        isset($appointment) ? $appointment->appointment_date->format('Y-m-d\TH:i') : ''
    );

    // IDs dos medicamentos já selecionados no modo editar.
    $selectedMedications = old(
        'medications',
        isset($appointment) ? $appointment->medications->pluck('id')->all() : []
    );
@endphp

<div class="form-group">
    <label for="appointment_date">Data e hora da consulta</label>
    <input type="datetime-local" id="appointment_date" name="appointment_date"
           value="{{ $dateValue }}"
           class="form-control @error('appointment_date') is-invalid @enderror" required>
    @error('appointment_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
    <label for="patient_id">Paciente</label>
    <select id="patient_id" name="patient_id"
            class="form-control @error('patient_id') is-invalid @enderror" required>
        <option value="">Selecione um paciente</option>
        @foreach ($patients as $patient)
            <option value="{{ $patient->id }}"
                    @if (old('patient_id', isset($appointment) ? $appointment->patient_id : '') == $patient->id)
                        selected
                @endif>
                {{ $patient->name }} — SNS: {{ $patient->sns_number }}
            </option>
        @endforeach
    </select>
    @error('patient_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
    <label for="doctor_id">Médico</label>
    <select id="doctor_id" name="doctor_id"
            class="form-control @error('doctor_id') is-invalid @enderror" required>
        <option value="">Selecione um médico</option>
        @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}"
                    @if (old('doctor_id', isset($appointment) ? $appointment->doctor_id : '') == $doctor->id)
                        selected
                @endif>
                {{ $doctor->name }} — {{ $doctor->specialty->name }}
            </option>
        @endforeach
    </select>
    @error('doctor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
    <label for="clinical_notes">Notas clínicas</label>
    <textarea id="clinical_notes" name="clinical_notes" rows="4"
              class="form-control @error('clinical_notes') is-invalid @enderror">{{ old('clinical_notes', isset($appointment) ? $appointment->clinical_notes : '') }}</textarea>
    @error('clinical_notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
    <label for="medications">Medicamentos prescritos</label>

    {{-- multiple permite selecionar mais do que um medicamento. --}}
    <select id="medications" name="medications[]" multiple
            class="form-control @error('medications') is-invalid @enderror">
        @foreach ($medications as $medication)
            <option value="{{ $medication->id }}"
                    @if (in_array($medication->id, $selectedMedications))
                        selected
                @endif>
                {{ $medication->name }}
                ({{ $medication->active_ingredient }} — {{ $medication->laboratory->name }})
            </option>
        @endforeach
    </select>

    <small class="form-text text-muted">
        Use Ctrl para selecionar vários medicamentos.
    </small>

    @error('medications')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
