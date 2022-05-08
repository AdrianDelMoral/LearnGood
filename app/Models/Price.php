<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    // Probando
    /* public function users()
    {
        return $this->belongsToMany(User::class);
    } */

    public function users(){
        return $this->hasMany(User::class);
    }

}
