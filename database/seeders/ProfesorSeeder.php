<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id'=>'Profesor',
            'nombre'=>'Andrea',
            'apellidos'=>'Corell Morales',
            'idioma'=>'Castellano',
            'descripcion'=>'Este es el segundo usuario, usuario profesor.',
            'email'=>'profesor@profesor.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
