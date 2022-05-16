<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $table = 'socials';

    protected $fillable = [
        'user_id',
        'platform_id',
        'username'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function platform ()
    {
        return $this->belongsTo(Platform::class);
    }
}
