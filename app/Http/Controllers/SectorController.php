<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    function __construct()
    {
        $this->middleware('can:sectors.listar')->only('index');
        $this->middleware('can:sectors.editar')->only('edit, update');
        $this->middleware('can:sectors.visualizar')->only('show');
        $this->middleware('can:sectors.crear')->only('create, store');
        $this->middleware('can:sectors.eliminar')->only('destroy');
    }

    public function index()
    {
        $sectors = Sector::all();
        return view('sectors.index', compact('sectors'));
    }


    public function create()
    {
        return view('sectors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'payment_date' => 'required|min:1',
        ]);

        $routers = Sector::create($request->all());
        return redirect()->route('sectors.index')->with('store', 'ok');
    }

    public function show($id)
    {
        $sectors = Sector::find($id);

        return view('sectors.show', compact('sectors'));
    }


    public function edit($id)
    {
        $sectors = Sector::find($id);
        return view('sectors.edit', compact('sectors'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'payment_date' => 'required',
        ]);
        $sectors = Sector::find($id);
        $sectors->update($request->all());
        return redirect()->route('sectors.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $sector = Sector::find($id);
        $sector->delete();
        return redirect()->route('sectors.index')->with('delete', 'ok');
    }
}
