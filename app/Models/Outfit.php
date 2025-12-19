<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    //modelo de organizaciones
    protected $fillable = [
        'parte_superior',
        'color_superior',
        'parte_infeiror',
        'color_infeiror',
        'calzado',
        'color_calzado',
        'accesorios',
        'persona_id' 
    ]; 
    

    public function Person() {
    return $this->belongsTo(Person::class);
    }
}
