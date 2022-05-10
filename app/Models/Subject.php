<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_finalizacion',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function level ()
    {
        return $this->belongsTo(Level::class);
    }
}
