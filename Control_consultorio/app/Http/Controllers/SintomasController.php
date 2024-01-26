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
            return redirect()->back()->with('Message','Consulte a otro especialista');
        }
        if ($a2=='No'){
            DB::table('cons_sint')->insert([
                'id_consulta'=>$id_consulta,
                'id_sintoma'=>2
            ]);

            if ($a3=='No'){
                return redirect()->back()->with('Message','Consulte a otro especialista');
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
                return redirect()->back()->with('Message','Consulte a otro especialista');
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
                return redirect()->back()->with('Message','Consulte a otro especialista');
            }
            if ($a6=='Si'){
                DB::table('cons_sint')->insert([
                    'id_consulta'=>$id_consulta,
                    'id_sintoma'=>6
                ]);
            }
            if ($a7=='No'){
                if ($a8=='No'){
                    return redirect()->back()->with('Message','Consulte a otro especialista');
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
            ->whereIn('Diag_Sint.id_sintoma', function ($query) {
                $query->select('id_sintoma')
                    ->from('Cons_Sint')
                    ->where('id_consulta', $id_consulta);
            })
            ->groupBy('Diag_Sint.id_diagnostico', 'Diagnosticos.nombre')
            ->orderByDesc(DB::raw('COUNT(Diag_Sint.id_diagnostico)'))
            ->first();
            return redirect()->back()->with('Message','El diagnostico es: $diagnostico->nombre');
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
