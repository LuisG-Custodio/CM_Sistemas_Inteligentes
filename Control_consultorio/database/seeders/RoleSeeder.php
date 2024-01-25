<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name'   => "Super Administrador"]);
        $roleAdmin = Role::create(['name'   => 'Gerencia']);
     
        $permissions = collect([
          
            ['group' => 'Pacientes',                          'name' => "system.paciente.list",                      'description' => "Permiso para acceder al listado de pacientes",                             'permisos' =>  collect(['all'])],
            ['group' => 'Pacientes',                          'name' => "system.paciente.create",                    'description' => "Permiso para registrar nuevos   pacientes",                     'permisos' =>  collect(['all'])],
            ['group' => 'Pacientes',                          'name' => "system.paciente.edit",                      'description' => "Permiso para editar la información de pacientes",         'permisos' =>  collect(['all'])],
            ['group' => 'Pacientes',                          'name' => "system.paciente.status",                    'description' => "Permiso para activar/suspender  pacientes",                    'permisos' =>  collect(['all'])],

            ['group' => 'Catálogos',                          'name' => "system.catalogue.view",                            'description' => "Permiso para visualizar el apartado de catálogos",                                    'permisos' =>  collect(['all'])],

            ['group' => 'Diagnostico',                          'name' => "system.diagnostico.list",                       'description' => "Permiso para acceder al listado  de diagnosticos",                              'permisos' => collect(['all'])],
            ['group' => 'Diagnostico',                          'name' => "system.diagnostico.create",                     'description' => "Permiso para registrar nuevo diagnosticos",                                   'permisos' => collect(['all'])],
            ['group' => 'Diagnostico',                          'name' => "system.diagnostico.status",                     'description' => "Permiso para cambiar estatus  de diagnosticos",                                  'permisos' => collect(['all'])],
            ['group' => 'Diagnostico  ',                        'name' => "system.diagnostico.view",                       'description' => "Permiso para ver los diagnosticos",                                        'permisos' =>  collect(['all'])],

            
            ['group' => 'Grupos y permisos',                'name' => "system.groups.list",                     'description' => "Permiso para acceder al listado de grupos y permisos",                    'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.create",                   'description' => "Permiso para registrar un nuevo grupo",                                   'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.edit",                     'description' => "Permiso para editar la información de los grupos",                        'permisos' =>  collect(['all'])],
            ['group' => 'Grupos y permisos',                'name' => "system.groups.delete",                   'description' => "Permiso para eliminar un grupo",                                          'permisos' =>  collect(['all'])],


            ['group' => 'Sintomas',                           'name' => "system.sintomas.list",                     'description' => "Permiso para acceder al listado de sintomas",                          'permisos' =>  collect(['all'])],
            ['group' => 'Sintomas',                           'name' => "system.sintomas.create",                   'description' => "Permiso para registrar nuevos sintomas",                               'permisos' =>  collect(['all'])],
            ['group' => 'Sintomas',                           'name' => "system.sintomas.edit",                     'description' => "Permiso para editar la información de los sintomas",                   'permisos' =>  collect(['all'])],
            ['group' => 'Sintomas',                           'name' => "system.sintomas.status",                   'description' => "Permiso para activar/suspender sintomas",                              'permisos' =>  collect(['all'])],

             
            ['group' => 'Consulta',                      'name' => "system.consulta.list",                   'description' => "Permiso para acceder al listado de consultas",                          'permisos' => collect(['all'])],
            ['group' => 'Consulta',                      'name' => "system.consulta.create",                 'description' => "Permiso para registrar nuevas consultas",                               'permisos' => collect(['all'])],
            ['group' => 'Consulta',                      'name' => "system.consulta.edit",                   'description' => "Permiso para editar la información de las consultas",                   'permisos' => collect(['all'])],
            ['group' => 'Consulta',                      'name' => "system.consulta.status",                 'description' => "Permiso para activar/suspender consultas",                              'permisos' => collect(['all'])],

           
            ['group' => 'Usuarios',                         'name' => "system.users.list",                      'description' => "Permiso para acceder al listado de usuarios",                             'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.create",                    'description' => "Permiso para registrar un nuevo usuario",                                 'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.edit",                      'description' => "Permiso para editar la información de los usuarios",                      'permisos' =>  collect(['all'])],
            ['group' => 'Usuarios',                         'name' => "system.users.status",                    'description' => "Permiso para activar/suspender usuarios",                                 'permisos' =>  collect(['all'])],            

            
        ]);


        
        $permissions->each(function ($permission, $value) use($roleSuperAdmin, $roleAdmin) {
            
            $collection  = $permission['permisos'];
            $groups = [];
            array_push($groups, $roleSuperAdmin, $roleAdmin);

            if ($collection->search('all') !== false) {

                array_push($groups);

            } else {
                
                if ($collection->search('Recursos Humanos') !== false) {

                    array_push($groups);    
                }
            }

            Permission::create([
                'group'         => $permission['group'],
                'name'          => $permission['name'],
                'description'   => $permission['description'],
            ])->syncRoles($groups);
        });

        
    }
}