<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'nombre'=>'Modelado 3D',
        ]);
        Level::create([
            'nombre'=>'Historia',
        ]);
        Level::create([
            'nombre'=>'Programacion',
        ]);
        Level::create([
            'nombre'=>'Bases de Datos',
        ]);
        Level::create([
            'nombre'=>'Matematicas',
        ]);
        Level::create([
            'nombre'=>'Castellano',
        ]);
        Level::create([
            'nombre'=>'Ingles',
        ]);
    }
}
