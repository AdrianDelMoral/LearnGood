<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /** * Validate and create a newly registered user. *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'descripcion' => ['max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'role_id' => $input['role_id'],
            'nombre' => $input['nombre'],
            'apellidos' => $input['apellidos'],
            'idioma' => $input['idioma'],
            'descripcion' => $input['descripcion'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
