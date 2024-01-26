<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       

        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre', 100);
            $table->string('AP', 100);
            $table->string('AM', 100);
            $table->date('fecha_nac');
            $table->timestamps();
        });

        Schema::create('sintomas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
        });

        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
        });

        Schema::create('diag_sint', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_diagnostico')->unsigned();
            $table->integer('id_sintoma')->unsigned();
            $table->foreign('id_diagnostico')->references('id')->on('diagnosticos');
            $table->foreign('id_sintoma')->references('id')->on('sintomas');
        });

        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->unsigned();
            $table->integer('consultorio');
            $table->decimal('peso', 5, 2);
            $table->decimal('estatura', 5, 2);
            $table->decimal('temperatura', 4, 2);
            $table->string('presion', 50);
            $table->integer('id_diagnostico')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_diagnostico')->references('id')->on('diagnosticos');
            $table->timestamps(); 
        });

        Schema::create('cons_sint', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_consulta')->unsigned();
            $table->integer('id_sintoma')->unsigned();
            $table->foreign('id_consulta')->references('id')->on('consultas');
            $table->foreign('id_sintoma')->references('id')->on('sintomas');
        });

    

        DB::table('sintomas')->insert([
            ['nombre' => 'El dolor es intenso y repentino'],
            ['nombre' => 'Dolor ligero'],
            ['nombre' => 'Nausas y vomito'],
            ['nombre' => 'Vomito explosivos y repetitivos'],
            ['nombre' => 'Diarrea'],
            ['nombre' => 'Aparición de síntomas en las últimas 6-8 horas después de comer'],
            ['nombre' => 'Dolor empeora al consumir alimentos, café o medicamentos'],
            ['nombre' => 'Consumió alimentos de alto riesgo'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cons_sint');
        Schema::dropIfExists('consultas');
        Schema::dropIfExists('diag_sint');
        Schema::dropIfExists('diagnosticos');
        Schema::dropIfExists('sintomas');
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('medicos');
        Schema::dropIfExists('personas');
    }
};
