<?php

namespace App\Models;
use App\Models\Person;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //modelo de organizaciones
    protected $fillable = [
        'nombre_organizacion',
        'zona',
        'person_id' 
    ];
    public function person(){
        return $this->belongsTo(Person::class);
    }
}
