<div class="form-group">
    <label for="name">Nome</label>

    <input type="text"
           id="name"
           name="name"
           value="{{ old('name', isset($doctor) ? $doctor->name : '') }}"
           class="form-control @error('name') is-invalid @enderror"
           required>

    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="license_number">Número de cédula profissional</label>

    <input type="text"
           id="license_number"
           name="license_number"
           value="{{ old('license_number', isset($doctor) ? $doctor->license_number : '') }}"
           class="form-control @error('license_number') is-invalid @enderror"
           required>

    @error('license_number')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="specialty_id">Especialidade</label>

    <select id="specialty_id"
            name="specialty_id"
            class="form-control @error('specialty_id') is-invalid @enderror"
            required>
        <option value="">Selecione uma especialidade</option>

        @foreach ($specialties as $specialty)
            <option value="{{ $specialty->id }}"
                    @if (old('specialty_id', isset($doctor) ? $doctor->specialty_id : '') == $specialty->id)
                        selected
                @endif>
                {{ $specialty->name }}
            </option>
        @endforeach
    </select>

    @error('specialty_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
