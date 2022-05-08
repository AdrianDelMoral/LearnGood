<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }

    public function specialty ()
    {
        return $this->belongsTo(Specialty::class);
    }
}
