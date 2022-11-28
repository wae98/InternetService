<?php

namespace App\Http\Controllers;

use App\Models\CableType;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function __construct()
    {
        $this->middleware('can:services.listar')->only('index');
        $this->middleware('can:services.editar')->only('edit, update');
        $this->middleware('can:services.visualizar')->only('show');
        $this->middleware('can:services.crear')->only('create, store');
        $this->middleware('can:services.eliminar')->only('destroy');
    }

    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }


    public function create()
    {
        $typecables = CableType::all();

        return view('services.create', compact('typecables'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|min:2',
            'installation_price' => 'required|min:2',
            'description' => 'required',
            'cable_type_id' => 'required',
        ]);

        $services = Service::create($request->all());

        return redirect()->route('services.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $services = Service::find($id);
        return view('services.show', compact('services'));
    }


    public function edit($id)
    {
        $services = Service::find($id);
        $typecables = CableType::all();
        return view('services.edit', compact('services', 'typecables'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|min:2',
            'installation_price' => 'required|min:2',
            'description' => 'required',
            'cable_type_id' => 'required',
        ]);

        $services = Service::find($id);
        $services->update($request->all());
        return redirect()->route('services.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $services = Service::find($id);
        $services->delete();
        return redirect()->route('services.index')->with('delete', 'ok');
    }
}
