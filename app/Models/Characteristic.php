<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

    protected $table = 'characteristics';

    protected $primaryKey = 'id_caracteristica';

    protected $fillable = [
        'sexo',
        'edad',
        'estatura',
        'complexion',
        'color_piel',
        'color_ojos',
        'color_cabello',
        'tipo_cabello',
        'senas_particulares',
        'implantes',
        'protesis',
        'senas_odontologicas',
        'persona_id',
    ];

    /**
     * Relación: una característica pertenece a una persona
     */
    public function person()
    {
        return $this->belongsTo(People::class);
    }
}
