<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagSintomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Datos de relación entre diagnósticos y síntomas
       $diagSintomas = [
        ['id_sintoma' => 2, 'id_diagnostico' => 1],
        ['id_sintoma' => 3, 'id_diagnostico' => 1],
        ['id_sintoma' => 7, 'id_diagnostico' => 1],
        ['id_sintoma' => 2, 'id_diagnostico' => 2],
        ['id_sintoma' => 3, 'id_diagnostico' => 2],
        ['id_sintoma' => 4, 'id_diagnostico' => 2],
        ['id_sintoma' => 6, 'id_diagnostico' => 2],
        ['id_sintoma' => 8, 'id_diagnostico' => 2],
        ['id_sintoma' => 1, 'id_diagnostico' => 3],
        ['id_sintoma' => 2, 'id_diagnostico' => 3],
        ['id_sintoma' => 5, 'id_diagnostico' => 3],
    ];

    // Insert relationship data into the 'diag_sint' table
    DB::table('diag_sint')->insert($diagSintomas);
    }
}
