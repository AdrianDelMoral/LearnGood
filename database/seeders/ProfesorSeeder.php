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
            'role_id' => 'Profesor',
            'nombre' => 'Cristina',
            'apellidos' => 'Mayorgas Hernández',
            'idioma' => 'Castellano',
            'descripcion' => 'Este es el segundo usuario, usuario profesor.',
            'email' => 'profesor@profesor.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        User::create([
            'role_id' => 'Profesor',
            'nombre' => 'Carlos',
            'apellidos' => 'Garcia Carmona',
            'idioma' => 'Ingles',
            'descripcion' => 'This is the third user, the user Carlos.',
            'email' => 'carlos@carlos.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        User::create([
            'role_id' => 'Profesor',
            'nombre' => 'Urbano',
            'apellidos' => 'Cebrian Sanchez',
            'idioma' => 'Castellano',
            'descripcion' => 'Este es el Tercer usuario, usuario profesor.',
            'email' => 'urbano@urbano.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
