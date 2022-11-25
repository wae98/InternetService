<?php

namespace App\Http\Controllers;

use App\Models\Mufa;
use Illuminate\Http\Request;

class MufaController extends Controller
{
    function __construct()
    {
        $this->middleware('can:mufas.listar')->only('index');
        $this->middleware('can:mufas.editar')->only('edit, update');
        $this->middleware('can:mufas.visualizar')->only('show');
        $this->middleware('can:mufas.crear')->only('create, store');
        $this->middleware('can:mufas.eliminar')->only('destroy');
    }
    public function index()
    {
        $mufas = Mufa::all();
        return view('mufas.index', compact('mufas'));
    }


    public function create()
    {

        return view('mufas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ubication' => 'required',
            'number' => 'required',
            'is_cable_onu' => 'required',
            'position_onu_olt' => 'required',
            'number_conexion' => 'required',
        ]);

        $mufas = Mufa::create($request->all());

        return redirect()->route('mufas.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $mufas = Mufa::find($id);
        return view('mufas.show', compact('mufas'));
    }


    public function edit($id)
    {
        $mufas = Mufa::find($id);
        return view('mufas.edit', compact('mufas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ubication' => 'required',
            'number' => 'required',
            'is_cable_onu' => 'required',
            'position_onu_olt' => 'required',
            'status' => 'required',
            'number_conexion' => 'required',
        ]);

        $mufas = Mufa::find($id);
        $mufas->update($request->all());
        return redirect()->route('mufas.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $mufas = Mufa::find($id);
        $mufas->delete();
        return redirect()->route('mufas.index')->with('delete', 'ok');
    }
}
