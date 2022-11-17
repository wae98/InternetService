<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    function __construct()
   {
      $this->middleware('can:usuarios.listar')->only('index');
      $this->middleware('can:usuarios.editar')->only('edit, update, searchempleado');
      $this->middleware('can:usuarios.crear')->only('create, store, searchempleado');
      $this->middleware('can:usuarios.eliminar')->only('destroy');
   }
    public function index()
    {
        $users = User::all();
        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $user = User::create(
            [
                'name' =>  $request['name'],
                'email' =>  $request['email'],
                'username' =>  $request['username'],
                'phone_number' =>  $request['phone_number'],
                'password' => Hash::make($request['password']),
            ]
        );
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')->with('create', 'ok');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $nameRole = $user->roles()->get();
        $roles = Role::all();

        return view('usuarios.edit', compact('user', 'roles', 'nameRole'));
    }
    public function searchempleado(Request $request)
    {
        $term = $request->get('term');
        $empleados = Empleado::select('id', 'nombre', 'email', 'username')
            ->where('empleados.nombre', 'LIKE', '%' . $term . '%')
            ->get();
        $data = [];
        foreach ($empleados as $empleado) {
            $data[] = [
                'label' => $empleado->nombre,
                'empleado_id' => $empleado->id,
                'username' => $empleado->username,
                'email' => $empleado->email,
            ];
        }
        return $data;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'empleado_id' => 'required|unique:users,empleado_id,' . $id,
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'status' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request['roles']);


        return redirect()->route('usuarios.index')->with('update', 'ok');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->back()->with('delete', 'ok');
    }
}
