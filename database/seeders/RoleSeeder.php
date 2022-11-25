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


        //PERMISO MENU REPORTES
        Permission::create([
            'name' => 'reports',
            'description' => 'Acceso al menu de reportes'
        ])->syncRoles([$role]);

        //PERMISO MENU MenuAdministracion
        Permission::create([
            'name' => 'MenuAdministracion',
            'description' => 'Acceso al menu de Administracion'
        ])->syncRoles([$role]);

        //PERMISO MENU CLIENTES
        Permission::create([
            'name' => 'customerAdministration',
            'description' => 'Acceso al menu de clientes'
        ])->syncRoles([$role]);

        //PERMISO MENU CLIENTES
        Permission::create([
            'name' => 'serviceAdministration',
            'description' => 'Acceso al menu de servicios'
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


        //permisos para Sectores
        Permission::create([
            'name' => 'sectors.listar',
            'description' => 'Permite listar los sectors creados'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'sectors.visualizar',
            'description' => 'Permite visualizar un sector en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'sectors.crear',
            'description' => 'Permite crear un nuevo sector'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'sectors.editar',
            'description' => 'Permite la edicion de un sector en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'sectors.eliminar',
            'description' => 'Permite eliminar un sector'
        ])->syncRoles([$role]);

        //permisos para Customer
        Permission::create([
            'name' => 'customers.listar',
            'description' => 'Permite listar los clientes creados'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'customers.visualizar',
            'description' => 'Permite visualizar un cliente en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'customers.crear',
            'description' => 'Permite crear un nuevo cliente'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'customers.editar',
            'description' => 'Permite la edicion de un cliente en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'customers.eliminar',
            'description' => 'Permite eliminar un cliente'
        ])->syncRoles([$role]);


        //permisos para Referencias

        Permission::create([
            'name' => 'personal.references.listar',
            'description' => 'Permite listar los referencias personales  creadas'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'personal.references.visualizar',
            'description' => 'Permite visualizar una referencias personales en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'personal.references.crear',
            'description' => 'Permite crear una nueva referencia personal'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'personal.references.editar',
            'description' => 'Permite la edicion de una referencia personal en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'personal.references.eliminar',
            'description' => 'Permite eliminar una referencia personal'
        ])->syncRoles([$role]);


        //permisos para tipos de cables

        Permission::create([
            'name' => 'cable.type.listar',
            'description' => 'Permite listar los tipos de cables creados'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'cable.type.visualizar',
            'description' => 'Permite visualizar un tipo de cable en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'cable.type.crear',
            'description' => 'Permite crear un tipo de cable '
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'cable.type.editar',
            'description' => 'Permite la edicion de un tipo de cable en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'cable.type.eliminar',
            'description' => 'Permite eliminar un tipo de cable'
        ])->syncRoles([$role]);


        //permisos para Services
        Permission::create([
            'name' => 'services.listar',
            'description' => 'Permite listar los servicios creados'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.visualizar',
            'description' => 'Permite visualizar un servicio en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.crear',
            'description' => 'Permite crear un nuevo servicio'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.editar',
            'description' => 'Permite la edicion de un servicio en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.eliminar',
            'description' => 'Permite eliminar un servicio'
        ])->syncRoles([$role]);


        //permisos para Mufas
        Permission::create([
            'name' => 'mufas.listar',
            'description' => 'Permite listar las mufas creadas'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'mufas.visualizar',
            'description' => 'Permite visualizar una mufa en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'mufas.crear',
            'description' => 'Permite crear una nueva mufa'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'mufas.editar',
            'description' => 'Permite la edicion de una mufa  en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'mufas.eliminar',
            'description' => 'Permite eliminaruna mufa  en especifico'

        ])->syncRoles([$role]);

        //permisos para Fails
        Permission::create([
            'name' => 'fails.listar',
            'description' => 'Permite listar las fallas creadas'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'fails.visualizar',
            'description' => 'Permite visualizar una falla en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'fails.crear',
            'description' => 'Permite crear una nueva falla'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'fails.editar',
            'description' => 'Permite la edicion de una falla en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'fails.eliminar',
            'description' => 'Permite eliminar una falla'
        ])->syncRoles([$role]);



        //permisos para pago de servicios adquiridos
        Permission::create([
            'name' => 'payments.services.listar',
            'description' => 'Permite listar los pagos de servicios adquiridos'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'payments.services.visualizar',
            'description' => 'Permite visualizar un pago de servicio adquirido en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'payments.services.crear',
            'description' => 'Permite crear un nuevo pago de servicios adquiridos'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'payments.services.editar',
            'description' => 'Permite la edicion de un pago de servicio adquirido en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'payments.services.eliminar',
            'description' => 'Permite eliminar un pago de servicio adquirido'
        ])->syncRoles([$role]);

        //permisos para proveedor de servicios
        Permission::create([
            'name' => 'services.providers.listar',
            'description' => 'Permite listar los servicios adquiridos'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.providers.visualizar',
            'description' => 'Permite visualizar un servicio adquirido en especifico.'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.providers.crear',
            'description' => 'Permite crear un nuevo servicios adquiridos'
        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.providers.editar',
            'description' => 'Permite la edicion de un servicio adquirido en especifico'

        ])->syncRoles([$role]);

        Permission::create([
            'name' => 'services.providers.eliminar',
            'description' => 'Permite eliminar un servicio adquirido'
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







        //PERMISO MENU SEGURIDAD
        Permission::create([
            'name' => 'MenuSeguridad',
            'description' => 'Acceso al menu de seguridad'
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

    }
}
