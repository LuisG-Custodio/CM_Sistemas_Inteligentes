<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Diagnostico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('system.consulta.list')) {
                abort(403, "No estás autorizado para acceder a esta zona");
            }

            return $next($request);
        });
    }

    public function index()
    {
        $PAGE_NAVIGATION = "CONSULTA";
        // Obtener la lista de pacientes desde la base de datos
        $pacientes = Paciente::all();
        $diagnosticos = Diagnostico::all();

        return view('admin.consulta.consulta_list', compact('PAGE_NAVIGATION', 'pacientes', 'diagnosticos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_paciente' => 'required|exists:pacientes,id',
            'consultorio' => 'required|string|max:100',
            'peso' => 'required|numeric',
            'estatura' => 'required|numeric',
            'temperatura' => 'required|numeric',
            'presion' => 'required|string|max:50',
            'id_diagnostico' => 'required|exists:diagnosticos,id',
        ]);

        // Obtener la edad del paciente
        $paciente = Paciente::findOrFail($request->input('id_paciente'));
        $edad = $this->calcularEdad($paciente->fecha_nac);

        // Asignar consultorio automáticamente según la edad
        $consultorio = $this->asignarConsultorio($edad);
        
        // Verificar si el consultorio ya tiene 50 registros
        $registrosConsultorio = Consulta::where('consultorio', $consultorio)->count();

        if ($registrosConsultorio >= 50) {
            return redirect()->route('consulta')->with('error', 'El consultorio está lleno, no se pueden agregar más pacientes.');
        }
        // Crear la nueva consulta
        $consulta = new Consulta;
        $consulta->id_paciente = $request->input('id_paciente');
        $consulta->consultorio = $consultorio;
        $consulta->peso = $request->input('peso');
        $consulta->estatura = $request->input('estatura');
        $consulta->temperatura = $request->input('temperatura');
        $consulta->presion = $request->input('presion');
        $consulta->id_diagnostico = $request->input('id_diagnostico');

        // Guardar la consulta en la base de datos
        $consulta->save();

        return redirect()->route('consulta')->with('success', 'Consulta creada exitosamente.');
    }

    // Función para calcular la edad a partir de la fecha de nacimiento
    private function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = new \DateTime($fechaNacimiento);
        $hoy = new \DateTime();
        $edad = $hoy->diff($fechaNacimiento);
        return $edad->y;
    }

    // Función para asignar consultorio automáticamente según la edad
    private function asignarConsultorio($edad)
    {
        if ($edad < 18) {
            return 1; // Consultorio 1 para menores de 18 años
        } elseif ($edad >= 18 && $edad <= 45) {
            return 2; // Consultorio 2 para edades entre 18 y 45 años
        } else {
            return 3; // Consultorio 3 para mayores de 45 años
        }
    }

    public function getconsulta(Request $request)
    {
        // Obtiene la lista de compras
        $consulta = Consulta::getconsulta();
        // Retorna la lista de compras en formato JSON
        return response()->json(['data' => $consulta]);
    }
}
