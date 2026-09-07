<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    protected $fillable = [
        'name',
        'description'
    ];

    // Uma especialidade possui vários médicos
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
