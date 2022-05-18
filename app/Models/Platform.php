<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $table = 'platforms';

    protected $fillable = [
        'nombre',
        'platformURL',
        'platformImage'
    ];

    public function socials (){
        return $this->hasMany(Social::class);
    }
}
