<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    /**
     * 
     * Los atributos que son asignables de manera masiva.
     * @var array<int, string>
     */
    protected $fillable = [
        'Nombre',
        'AP',
        'AM',
        'fecha_nac',
    ];


    public static function getpaciente()
    {
        // Consulta a la base de datos para obtener todos los productos ordenados por 'supplier'.
        $paciente = Paciente::
            orderBy('Nombre')
            ->get();
        // Devuelve la colección de productos obtenida de la base de datos.
        return $paciente;
    }
}
