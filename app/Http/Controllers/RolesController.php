<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    function __construct()
   {
      $this->middleware('can:roles.listar')->only('index');
      $this->middleware('can:roles.editar')->only('edit, update');
      $this->middleware('can:roles.crear')->only('create, store');
      $this->middleware('can:roles.eliminar')->only('destroy');
   }

    public function index()
    {
        $roles1 = Role::all();

        return view('roles.index', compact('roles1'));
    }
    public function create()
    {

        $permission = Permission::get();

        return view('roles.create', compact('permission'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|unique:roles,name',

            'permission' => 'required',

        ]);



        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));



        return redirect()->route('roles.index')->with('create', 'ok');
    }
    public function show($id)
    {

        $role = Role::find($id);

        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")

            ->where("role_has_permissions.role_id", $id)

            ->get();



        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {

        $role = Role::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)

            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')

            ->all();



        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('update', 'ok');
    }

    public function destroy($id)
    {

        DB::table("roles")->where('id', $id)->delete();

        return redirect()->route('roles.index')->with('delete', 'ok');
    }
}
