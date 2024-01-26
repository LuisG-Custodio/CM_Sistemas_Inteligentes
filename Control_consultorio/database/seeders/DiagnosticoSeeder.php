<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class DiagnosticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $diagnosticos = [
            ['nombre' => 'Gastritis'],
            ['nombre' => 'Intoxicación alimentaria'],
            ['nombre' => 'Posible infección bacteriana o viral'],
            ['nombre' => 'Consulte con otro especialista'],
            ['nombre' => 'Pendiente'],
        ];

        // Insert diagnostic data into the 'diagnosticos' table
        DB::table('diagnosticos')->insert($diagnosticos);
    }
}
