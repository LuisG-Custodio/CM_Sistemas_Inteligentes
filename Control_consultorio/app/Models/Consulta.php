<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consulta extends Model
{
    use HasFactory;

    
    /**
     * 
     * Los atributos que son asignables de manera masiva.
     * @var array<int, string>
     */
    protected $fillable = [
        'id_paciente',
        'consultorio',
        'peso',
        'estatura',
        'temperatura',
        'presion',
        'id_diagnostico',
        
    ];


    public static function getconsulta()
    {
        // Consulta a la base de datos para obtener información de la tabla 'consultas'
        // y unir la tabla 'pacientes' utilizando la relación 'id_paciente'.
        $consulta = DB::table('consultas')
            ->join('pacientes', 'consultas.id_paciente', '=', 'pacientes.id')
            ->join('diagnosticos', 'consultas.id_diagnostico', '=', 'diagnosticos.id')
            ->select(
                'pacientes.Nombre',
                'pacientes.AP',
                'pacientes.AM',
                'consultas.id',
                'consultas.consultorio',
                'consultas.peso',
                'consultas.estatura',
                'consultas.temperatura',
                'consultas.presion',
                'consultas.id_diagnostico',
                'diagnosticos.nombre',
               
            )
            ->orderBy('consultas.consultorio')
            ->get();

        // Devuelve la colección de consultas con la información del paciente.
        return $consulta;
    }
}
