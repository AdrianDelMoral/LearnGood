<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_profesor',
        'user_id_alumno',
        'courses_id',
        'status',
    ];

    protected $table = 'orders';
    public function getAlumno()
    {   // Obtiene la id del alumno, y obtiene los profesores solicitados
        return $this->belongsTo(User::class, 'user_id_alumno');
    }

    public function getProfesor()
    {   // Obtiene la id del profesor, y obtiene los profesores solicitados
        return $this->belongsTo(User::class, 'user_id_profesor');
    }

    public function cursoModel(){
        return $this->belongsTo(Course::class, 'courses_id');
    }

}
