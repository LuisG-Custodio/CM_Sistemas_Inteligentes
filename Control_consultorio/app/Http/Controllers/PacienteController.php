<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (!Gate::allows('system.paciente.list')) {
                abort(403, "No estas autorizado de acceder a esta zona");
            }

            return $next($request);
        });
    }




    /**
     * Dirige hacia la vista principal de listas de equipos de computo en la sección de catálogos.
     */
    public function index()
    {
        $PAGE_NAVIGATION = "PACIENTE";
        return view('admin.paciente.paciente_list', compact('PAGE_NAVIGATION'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validación de datos (puedes ajustar según tus necesidades)
        $request->validate([
            'name' => 'required|string|max:100',
            'ap' => 'required|string|max:100',
            'am' => 'required|string|max:100',
            'fechan' => 'required|date',
        ]);

        // Crear un nuevo paciente usando el modelo
        $paciente = new Paciente;
        $paciente->Nombre = $request->input('name');
        $paciente->AP = $request->input('ap');
        $paciente->AM = $request->input('am');
        $paciente->fecha_nac = $request->input('fechan');

        // Guardar el paciente en la base de datos
        $paciente->save();

        // Redireccionar a la vista principal de pacientes
        return redirect()->route('paciente')->with('success', 'Paciente creado exitosamente.');
    }

    public function getpaciente(Request $request)
    {
        // Obtiene la lista de compras
        $paciente = Paciente::getpaciente();
        // Retorna la lista de compras en formato JSON
        return response()->json(['data' => $paciente]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
