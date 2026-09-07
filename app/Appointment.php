<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'appointment_date',
        'clinical_notes',
        'doctor_id',
        'patient_id',
    ];

    //Uma consulta pertence a um médico
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    //Uma consulta pertence a um paciente
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Uma consulta pode ter vários medicamentos na prescrição.
    public function medications()
    {
        return $this->belongsToMany(Medication::class)->withTimestamps();
    }
}
