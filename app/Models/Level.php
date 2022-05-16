<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $fillable = [
        'user_id',
        'levels_id',
        'descripcion',
        'fechaFinalizacion'
    ];

    public function studies (){
        return $this->hasMany(Subject::class);
    }
}
