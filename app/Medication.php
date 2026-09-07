<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'name',
        'active_ingredient',
        'laboratory_id',
    ];

    // Um medicamento pertence a um laboratório
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    // Um medicamento pode ser prescrito em varias consultas.
    public function appointments()
    {
        return $this->belongsToMany(Medication::class);
    }
}
