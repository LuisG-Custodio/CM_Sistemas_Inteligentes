<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Administration\Groups\Create\Add;
use Administration\Groups\Update\Adjust;

class consultaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct()
     {
         $this->middleware(function ($request, $next){
             
             if (!Gate::allows('system.consulta.list')) {
                 abort(403, "No estas autorizado de acceder a esta zona");
             }
  
             return $next($request);
         });
     }
     


     
     /**
      * Dirige a la interfaz principal de grupos y permisos
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         $PAGE_NAVIGATION = "CONSULTA";
         
         return view('admin.consulta.consulta_list', compact('PAGE_NAVIGATION'));
     }
 
 
 

 }
 