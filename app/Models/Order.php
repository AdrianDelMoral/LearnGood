<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /* public function getAlumnos()
    {                           // Obtiene la id del alumno, y obtiene los profesores solicitados
        return $this->belongsToMany(User::class, 'orders', 'user_id_alumno', 'user_id_profesor');
    }

    public function getProfesores()
    {                           // Obtiene la id del profesor, y obtiene los alumnos que le han solicitado
        return $this->belongsToMany(User::class, 'orders', 'user_id_profesor', 'user_id_alumno');
    } */

    protected $table = 'orders';

    protected $fillable = [
        'user_id_alumno',
        'prices_id',
        'status',
    ];

    public function prices(){
        return $this->belongsTo(Price::class);
    }

    // Luego podrás relacionar los usuarios:
        // $usuario_seguido->seguidores()->attach($usuarioId);

    // Y obtener los resultados:
        // $seguidores = $user->seguidores;
        // $seguidos = $user->seguidos;
}
