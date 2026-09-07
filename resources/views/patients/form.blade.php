<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" id="name" name="name"
           value="{{ old('name', isset($patient) ? $patient->name : '') }}"
           class="form-control @error('name') is-invalid @enderror" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email"
           value="{{ old('email', isset($patient) ? $patient->email : '') }}"
           class="form-control @error('email') is-invalid @enderror" required>
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
    <label for="sns_number">Número de utente SNS</label>
    <input type="text" id="sns_number" name="sns_number"
           maxlength="9"
           value="{{ old('sns_number', isset($patient) ? $patient->sns_number : '') }}"
           class="form-control @error('sns_number') is-invalid @enderror" required>
    <small class="form-text text-muted">Deve conter exatamente 9 algarismos.</small>
    @error('sns_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="form-group">
    <label for="birth_date">Data de nascimento</label>
    <input type="date" id="birth_date" name="birth_date"
           value="{{ old('birth_date', isset($patient) ? $patient->birth_date->format('Y-m-d') : '') }}"
           class="form-control @error('birth_date') is-invalid @enderror" required>
    @error('birth_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
