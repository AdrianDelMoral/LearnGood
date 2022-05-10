<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva, al guardar en un formulario
    protected $fillable =[
        'nombre'
    ];

    public function socials (){
        return $this->hasMany(Social::class);
    }
}
