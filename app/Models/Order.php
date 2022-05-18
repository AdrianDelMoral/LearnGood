<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getAlumno()
    {                           // Obtiene la id del alumno, y obtiene los profesores solicitados
        return $this->belongsTo(User::class, 'user_id_alumno');
    }

    public function getProfesor()
    {                           // Obtiene la id del profesor, y obtiene los profesores solicitados
        return $this->belongsTo(User::class, 'user_id_profesor');
    }

    protected $table = 'orders';

    protected $fillable = [
        'user_id_profesor',
        'user_id_alumno',
        'courses_id',
        'status',
    ];

    public function cursoModel(){
        return $this->belongsTo(Course::class, 'courses_id');
    }

    // Luego podrás relacionar los usuarios:
        // $usuario_seguido->seguidores()->attach($usuarioId);

    // Y obtener los resultados:
        // $seguidores = $user->seguidores;
        // $seguidos = $user->seguidos;
}
