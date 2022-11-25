<?php

namespace App\Http\Controllers;

use App\Models\Fail;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FailController extends Controller
{
    function __construct()
    {
        $this->middleware('can:fails.listar')->only('index');
        $this->middleware('can:fails.editar')->only('edit, update');
        $this->middleware('can:fails.visualizar')->only('show');
        $this->middleware('can:fails.crear')->only('create, store');
        $this->middleware('can:fails.eliminar')->only('destroy');
    }
    public function index()
    {
        $fails = Fail::all();
        return view('fails.index', compact('fails'));
    }


    public function create()
    {
        $serviceproviders = ServiceProvider::where('status',1)->get();
        return view('fails.create', compact('serviceproviders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service_provider_id' => 'required',
            'status' => 'required',
            'date_report' => 'required',
            'observations' => 'required',
        ]);

        $fails = Fail::create(
            [
                'date_repair' =>  $request['date_repair'],
                'date_report' =>  $request['date_report'],
                'observations' =>  $request['observations'],
                'status' =>  $request['status'],
                'service_provider_id' =>  $request['service_provider_id'],
                'user_id' => Auth::id(),
            ]
        );

        return redirect()->route('fails.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $fails = Fail::find($id);
        return view('fails.show', compact('fails'));
    }


    public function edit($id)
    {
        $fails = Fail::find($id);
        $serviceproviders = ServiceProvider::where('status',1)->get();
        return view('fails.edit', compact('serviceproviders', 'fails'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'service_provider_id' => 'required',
            'status' => 'required',
            'date_report' => 'required',
            'observations' => 'required',
        ]);

        $fails = Fail::find($id);
        $fails->update($request->all());
        return redirect()->route('fails.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $fails = Fail::find($id);
        $fails->delete();
        return redirect()->route('fails.index')->with('delete', 'ok');
    }
}
