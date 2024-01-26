<?php

namespace App\Http\Controllers;

use App\Models\Sintomas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
class SintomasController extends Controller
{
     /**
    * Create a new controller instance.
    *
    * @return void
    */
    
    public function __construct()
    {
        $this->middleware(function ($request, $next){
             
            if (!Gate::allows('system.sintoma.list')) {
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
        $PAGE_NAVIGATION = "SINTOMA";
        return view('admin.sintoma.sintoma_list', compact('PAGE_NAVIGATION'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sintomas $sintomas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sintomas $sintomas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sintomas $sintomas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sintomas $sintomas)
    {
        //
    }
}
