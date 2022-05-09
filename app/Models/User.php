<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    /** *
     * The attributes that are mass assignable. *
     * @var string[]
     */
    protected $fillable = [
        'role_id',
        'nombre',
        'apellidos',
        'descripcion',
        'idioma',
        'email',
        'password',
    ];
    /** *
     * The attributes that should be hidden for serialization. *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    /** *
     * The attributes that should be cast. *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /** *
     * The accessors to append to the model's array form. *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    // Probando
    public function subject()
    {
        return $this->belongsToMany(Subject::class);
    }


    public function social()
    {
        return $this->belongsToMany(Social::class);
    }


    public function seguidos()
    {
        return $this->belongsToMany(User::class, 'user_user', 'user_id', 'user_id_seguido');
    }
    // Y para declarar la relación inversa:

    public function seguidores()
    {
        return $this->belongsToMany(User::class, 'user_user', 'user_id_seguido', 'user_id');
    }

    // Luego podrás relacionar los usuarios:

    // $usuario_seguido->seguidores()->attach($usuarioId);
    // Y obtener los resultados:
    //
    // $seguidores = $user->seguidores;
    //
    // $seguidos = $user->seguidos;

}
