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
        $consulta->id_diagnostico = 5;

        // Guardar la consulta en la base de datos
        $consulta->save();

        $id_consulta = $consulta->id;
        $a1=$request->input('answer1');
        $a2=$request->input('answer2');
        $a3=$request->input('answer3');
        $a4=$request->input('answer4');
        $a5=$request->input('answer5');
        $a6=$request->input('answer6');
        $a7=$request->input('answer7');
        $a8=$request->input('answer8');
        //$id_consulta-> de donde lo obtenemos?
        
        if ($a1=='No'){
            Consulta::where('id',$id_consulta)->update([
                'id_diagnostico' => 4,
            ]);
            return redirect()->route('consulta')->with('success', 'Consulta creada exitosamente.');
        }
        if ($a2=='No'){
            DB::table('cons_sint')->insert([
                'id_consulta'=>$id_consulta,
                'id_sintoma'=>2
            ]);

            if ($a3=='No'){
                Consulta::where('id',$id_consulta)->update([
                    'id_diagnostico' => 4,
                ]);
                return redirect()->route('consulta')->with('success', 'Consulta creada exitosamente.');
            }
            if ($a3=='Si'){
                DB::table('cons_sint')->insert([
                    'id_consulta'=>$id_consulta,
                    'id_sintoma'=>3
                ]);
            }
            if ($a4=='Si'){
                DB::table('cons_sint')->insert([
                    'id_consulta'=>$id_consulta,
                    'id_sintoma'=>4
                ]);
            }
            if ($a5=='No'){
                Consulta::where('id',$id_consulta)->update([
                    'id_diagnostico' => 4,
                ]);
                return redirect()->route('consulta')->with('success', 'Consulta creada exitosamente.');
            }
            if ($a5=='Si'){
                DB::table('cons_sint')->insert([
                    'id_consulta'=>$id_consulta,
                    'id_sintoma'=>7
                ]);
            }
        }
        if ($a2=='Si'){
            DB::table('cons_sint')->insert([
                'id_consulta'=>$id_consulta,
                'id_sintoma'=>1
            ]);
            if ($a6=='No'){
                Consulta::where('id',$id_consulta)->update([
                    'id_diagnostico' => 4,
                ]);
                return redirect()->route('consulta')->with('success', 'Consulta creada exitosamente.');
            }
            if ($a6=='Si'){
                DB::table('cons_sint')->insert([
                    'id_consulta'=>$id_consulta,
                    'id_sintoma'=>6
                ]);
            }
            if ($a7=='No'){
                if ($a8=='No'){
                    Consulta::where('id',$id_consulta)->update([
                        'id_diagnostico' => 4,
                    ]);
                    return redirect()->route('consulta')->with('success', 'Consulta creada exitosamente.');
                }
                if ($a8=='Si'){
                    DB::table('cons_sint')->insert([
                        'id_consulta'=>$id_consulta,
                        'id_sintoma'=>5
                    ]);
                }
            }
            if ($a7=='Si'){
                DB::table('cons_sint')->insert([
                    'id_consulta'=>$id_consulta,
                    'id_sintoma'=>8
                ]);
            }
        }
        $diagnostico = DB::table('Diag_Sint')
            ->select('Diag_Sint.id_diagnostico', 'Diagnosticos.nombre')
            ->join('Diagnosticos', 'Diag_Sint.id_diagnostico', '=', 'Diagnosticos.id')
            ->whereIn('Diag_Sint.id_sintoma', function ($query) use ($id_consulta) {
                $query->select('id_sintoma')
                    ->where('id_consulta', $id_consulta)
                    ->from('Cons_Sint');
            })
            ->groupBy('Diag_Sint.id_diagnostico', 'Diagnosticos.nombre')
            ->orderByDesc(DB::raw('COUNT(Diag_Sint.id_diagnostico)'))
            ->first();
            Consulta::where('id', $id_consulta)->update([
                'id_diagnostico' => $diagnostico->id_diagnostico,
            ]);
            

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
