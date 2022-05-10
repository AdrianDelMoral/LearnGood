<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function platform ()
    {
        return $this->belongsTo(Platform::class);
    }
}
