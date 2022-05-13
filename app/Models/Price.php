<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'prices';

    protected $fillable = [
        'user_id',
        'nombrePack',
        'precio',
        'ventajaUno',
        'ventajaDos',
        'ventajaTres'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

}
