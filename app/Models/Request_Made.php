<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Made extends Model
{
    use HasFactory;
    // Probando
    public function alumno()
    {
        return $this->belongsToMany(User::class);
    }

    public function profesor()
    {
        return $this->belongsToMany(User::class);
    }
}
