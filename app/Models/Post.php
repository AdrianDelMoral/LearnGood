<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'courses_id',
        'titulo',
        'entrada',
        'contenidoPost',
        'imagePost',
        'video',
    ];

    public function courses(){
        return $this->belongsTo(Course::class, 'courses_id');
    }
}
