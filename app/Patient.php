<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
        'name',
        'email',
        'sns_number',
        'birth_date'
    ];

    protected $dates = [
        'birth_date',
    ];

    // Um paciente pode ter várias consultas
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
