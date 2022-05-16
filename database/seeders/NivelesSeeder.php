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
            'nombre'=>'A1',
        ]);
        Level::create([
            'nombre'=>'A2',
        ]);
        Level::create([
            'nombre'=>'B1',
        ]);
        Level::create([
            'nombre'=>'B2',
        ]);
        Level::create([
            'nombre'=>'C1',
        ]);
        Level::create([
            'nombre'=>'C2',
        ]);
    }
}
