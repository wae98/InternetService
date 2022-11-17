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
        $role2=Role::create(['name' => 'Ventas']);
        Permission::create(['name' => 'dashboard'])->syncRoles([$role]);

        Permission::create(['name' => 'proveedores.listar'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'proveedores.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'proveedores.editar'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'proveedores.eliminar'])->syncRoles([$role]);


        Permission::create(['name' => 'agencias.listar'])->syncRoles([$role]);
        Permission::create(['name' => 'agencias.create'])->syncRoles([$role]);
        Permission::create(['name' => 'agencias.editar'])->syncRoles([$role]);
        Permission::create(['name' => 'agencias.eliminar'])->syncRoles([$role]);

        Permission::create(['name' => 'colaboradores.listar'])->syncRoles([$role]);
        Permission::create(['name' => 'colaboradores.create'])->syncRoles([$role]);
        Permission::create(['name' => 'colaboradores.editar'])->syncRoles([$role]);
        Permission::create(['name' => 'colaboradores.eliminar'])->syncRoles([$role]);

        Permission::create(['name' => 'clientes.listar'])->syncRoles([$role]);
        Permission::create(['name' => 'clientes.create'])->syncRoles([$role]);
        Permission::create(['name' => 'clientes.editar'])->syncRoles([$role]);
        Permission::create(['name' => 'clientes.eliminar'])->syncRoles([$role]);

        Permission::create(['name' => 'categorias.listar'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'categorias.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'categorias.editar'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'categorias.eliminar'])->syncRoles([$role]);

        Permission::create(['name' => 'productos.listar'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'productos.editar'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'productos.eliminar'])->syncRoles([$role]);
        Permission::create(['name' => 'productos.reportepdf'])->syncRoles([$role, $role2]);

        Permission::create(['name' => 'MenuCompras'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'compras.nueva'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'compras.eliminar'])->syncRoles([$role]);
        Permission::create(['name' => 'compras.realizadas'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'compras.reportes'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'compras.facturapdf'])->syncRoles([$role, $role2]);

        Permission::create(['name' => 'MenuPedidos'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'pedidos.nueva'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'pedidos.realizados'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'pedidos.eliminar'])->syncRoles([$role]);
        Permission::create(['name' => 'pedidos.pdf'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'pedidos.reportes'])->syncRoles([$role, $role2]);

        Permission::create(['name' => 'usuarios.listar'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.crear'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.editar'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.eliminar'])->syncRoles([$role]);

        Permission::create(['name' => 'roles.listar'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.visualizar'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.crear'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.editar'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.eliminar'])->syncRoles([$role]);
    }
}
