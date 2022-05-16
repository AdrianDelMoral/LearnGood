<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function prices(){
        return $this->belongsTo(Price::class);
    }

    // Luego podrás relacionar los usuarios:
        // $usuario_seguido->seguidores()->attach($usuarioId);

    // Y obtener los resultados:
        // $seguidores = $user->seguidores;
        // $seguidos = $user->seguidos;
}
