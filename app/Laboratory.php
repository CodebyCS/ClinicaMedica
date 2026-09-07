<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $fillable = [
        'name',
        'contact_email'
    ];

    // Um laboratório possui vários medicamentos
    public function medications()
    {
        return $this->hasMany(Medication::class);
    }
}
