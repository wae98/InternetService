<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Role::create(['name' => 'SuperAdmin']);
        $role2=Role::create(['name' => 'Cobrador']);
        $role3=Role::create(['name' => 'Técnico']);
        $role4=Role::create(['name' => 'Oficina']);

        Permission::create([
            'name' => 'dashboard',
            'description' => 'Permite visualizar el dashboard'
        ])->syncRoles([$role]);


        //asignacion al modulo de clientes
        Permission::create([
            'name' => 'clientes.listar',
            'description' => 'Permite visualizar una lista de datos de los clientes'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'clientes.create',
            'description' => 'Permite la creacion de un cliente'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'clientes.editar',
            'description' => 'Permite la edicion de un cliente'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'clientes.eliminar',
            'description' => 'Permite eliminar un cliente'
        ])->syncRoles([$role]);


        //asignacion de permisos
        Permission::create([
            'name' => 'usuarios.listar',
            'description' => 'Permite visualizar una lista de datos de los usuarios'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'usuarios.create',
            'description' => 'Permite la creacion de un usuario'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'usuarios.editar',
            'description' => 'Permite la edicion de un usuario'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'usuarios.eliminar',
            'description' => 'Permite eliminar un usuario'
        ])->syncRoles([$role]);


        // permisos para roles
        Permission::create([
            'name' => 'roles.listar',
            'description' => 'Permite listar los roles creados'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'roles.visualizar',
            'description' => 'Permite visualizar un rol en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'roles.crear',
            'description' => 'Permite crear un nuevo rol'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'roles.editar',
            'description' => 'Permite la edicion de un rol en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'roles.eliminar',
            'description' => 'Permite eliminar un rol'
        ])->syncRoles([$role]);

        // asignacion de permiso para el menu de administracion

        Permission::create([
            'name' => 'MenuAdministracion',
            'description' => 'Permite acceder a los modulos de administracion'
        ])->syncRoles([$role]);
        //permisos para Routers
        Permission::create([
            'name' => 'routers.listar',
            'description' => 'Permite listar los routers creados'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'routers.visualizar',
            'description' => 'Permite visualizar un router en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'routers.crear',
            'description' => 'Permite crear un nuevo router'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'routers.editar',
            'description' => 'Permite la edicion de un router en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'routers.eliminar',
            'description' => 'Permite eliminar un router'
        ])->syncRoles([$role]);



        //menu administracion de routers
        Permission::create([
            'name' => 'routersAdministracion',
            'description' => 'Permite Habilitar el permiso para administracion de routers'
        ])->syncRoles([$role]);


        //Lista de permisos para StatusRouters
        Permission::create([
            'name' => 'status.routers.listar',
            'description' => 'Permite listar los status de routers creados'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'status.routers.visualizar',
            'description' => 'Permite visualizar un status de router en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'status.routers.crear',
            'description' => 'Permite crear un nuevo status de router'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'status.routers.editar',
            'description' => 'Permite la edicion de un status de router en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'status.routers.eliminar',
            'description' => 'Permite eliminar un status de rol'
        ])->syncRoles([$role]);

    }
}
