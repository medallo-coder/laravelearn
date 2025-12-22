<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [

        'email',        
        'password',
        'nombres',
        'apellidos',
        'descripcion',
        'lugar_desaparicion',
        'fecha_desaparicion',
        'foto',
        'rol_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at'   => 'datetime',
        'fecha_desaparicion'  => 'datetime',
    ];

    // ===============================
    // RELACIONES
    // ===============================

    public function rol()
    {
        return $this->belongsTo(Role::class);
    }

}
