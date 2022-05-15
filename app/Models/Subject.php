<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'user_id',
        'levels_id',
        'descripcion',
        'fecha_finalizacion'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function level ()
    {
        return $this->belongsTo(Level::class);
    }
}
