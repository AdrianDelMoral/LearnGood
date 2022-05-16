<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $table = 'studies';

    protected $fillable = [
        'user_id',
        'levels_id',
        'nota',
        'fechaFinalizacion'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function level ()
    {
        return $this->belongsTo(Level::class, 'id');
    }
}
