<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SintomasController;
use App\Http\Controllers\consultaController;
use App\Http\Middleware\IsActive;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
***********************************************************************
>>>> Rutas para acceder dentro del sistema
***********************************************************************
*/
Route::group(['middleware' => ['auth', 'is-active']], function() {
    /*
    ***********************************************************************
    >>>> Dashboard 
    ***********************************************************************
    */
    
    //Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', IsActive::class])->name('dashboard');
    /*
    ***********************************************************************
    >>>> Groups
    ***********************************************************************
    */

    // List
    Route::get('/groups', [GroupController::class, 'index'])->name('groups');

    // List JSON
    Route::get('/groups/list-groups', [GroupController::class, 'getGroups'])->name('groupList');

    // Info
    Route::get('/groups/{role}', [GroupController::class, 'getInfo'])->name('infoGroup');

    //Store
    Route::post('/groups', [GroupController::class, 'store'])->name('groupStore');

    // Update
    Route::patch('/groups-update/{role}', [GroupController::class, 'update'])->name('updateGroup');

    //Delete
    Route::post('/groups/deleted/{role}', [GroupController::class, 'destroy'])->name('groupDeteled');

   
        
    /*
    ***********************************************************************
    >>>> Profile
    ***********************************************************************
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   

    /*
    ***********************************************************************
    >>>> Paciente 
    ***********************************************************************
    */
    
    // List
    Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente');

    // List JSON
    Route::get('/paciente/list-paciente', [PacienteController::class, 'getpaciente'])->name('pacienteList');

    // Info
    Route::get('/paciente/{paciente}', [PacienteController::class, 'getInfo'])->name('infopaciente');

    //Store
    Route::post('/paciente', [PacienteController::class, 'store'])->name('pacienteStore');

    
    /*
    ***********************************************************************
    >>>> Sintomas 
    ***********************************************************************
    */
    
    // List
    Route::get('/sintomas', [SintomasController::class, 'index'])->name('sintomas');

    // List JSON
    Route::get('/sintomas/list-sintomas', [SintomasController::class, 'getsintomas'])->name('sintomasList');

    // Info
    Route::get('/sintomas/{sintomas}', [SintomasController::class, 'getInfo'])->name('infosintomas');

    //Store
    Route::post('/sintomas', [SintomasController::class, 'store'])->name('sintomasStore');

    
    /*
    ***********************************************************************
    >>>> Users
    ***********************************************************************
    */

    // List
    Route::get('/users', [UserController::class, 'index'])->name('users');

    // List JSON
    Route::get('/users/list-users', [UserController::class, 'getUsers'])->name('userList');

    // Info
    Route::get('/users/{user}', [UserController::class, 'getInfo'])->name('infoUser');

    // Update
    Route::patch('/users-update/{user}', [UserController::class, 'update'])->name('updateUser');

    //Store
    Route::post('/users', [UserController::class, 'store'])->name('userStore');

    //Suspended
    Route::post('/users-inactive/{user}', [UserController::class, 'inactive'])->name('userInactived');

    //Actived
    Route::post('/users-active/{user}', [UserController::class, 'active'])->name('userActived');



    /*
    ***********************************************************************
    >>>> consulta
    ***********************************************************************
    */

    // List
    Route::get('/consulta', [consultaController::class, 'index'])->name('consulta');

    // Info
    Route::get('/consulta/{consulta}', [consultaController::class, 'getInfo'])->name('infoconsulta');

    // Update
    Route::patch('/consulta-update/{consulta}', [consultaController::class, 'update'])->name('updateconsulta');

    //Store
    Route::post('/consulta', [consultaController::class, 'store'])->name('consultaStore');


});
require __DIR__.'/auth.php';
