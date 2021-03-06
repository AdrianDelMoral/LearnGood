<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'studies_id',
        'nombreCurso',
        'precio',
        'descripcion',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function studies(){
        return $this->belongsTo(Study::class, 'studies_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'courses_id');
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

}
