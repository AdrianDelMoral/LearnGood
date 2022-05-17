<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'user_id',
        'studies_id',
        'nombreCurso',
        'precio',
        'descripcion',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function estudies(){
        return $this->belongsTo(Study::class, 'studies_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

}
