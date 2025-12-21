<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Organization extends Model
{
    // Modelo de organizaciones
    protected $fillable = [
        'nombre_organizacion',
        'zona',
        'person_id'
    ];

    public function person()
    {
        return $this->belongsTo(User::class, 'person_id');
    }
}
