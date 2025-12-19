<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $fillable = [
        'nombres',
        'apellidos',
        'edad',
        'edad_actual',
        'descripcion',
        'fecha',
        'sexo',
        'descripcion_fisica',
        'lugar',
        'vestimenta',
        'role_id',
    ];

    /**
     * Una persona pertenece a un rol
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Una persona puede estar asociada a varias organizaciones
     */
    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    /**
     * Vestimentas de la persona
     */
    public function outfits()
    {
        return $this->hasMany(Outfit::class);
    }

    /**
     * Características físicas (1 a 1)
     */
    public function characteristic()
    {
        return $this->hasOne(Characteristic::class);
    }
}
