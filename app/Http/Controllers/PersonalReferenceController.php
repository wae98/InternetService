<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PersonalReference;
use Illuminate\Http\Request;

class PersonalReferenceController extends Controller
{
    function __construct()
    {
        $this->middleware('can:personal.references.listar')->only('index');
        $this->middleware('can:personal.references.editar')->only('edit, update');
        $this->middleware('can:personal.references.visualizar')->only('show');
        $this->middleware('can:personal.references.crear')->only('create, store');
        $this->middleware('can:personal.references.eliminar')->only('destroy');
    }

    public function index()
    {
        $references = PersonalReference::all();
        return view('references.index', compact('references'));
    }


    public function create()
    {
        $customers = Customer::all();

        return view('references.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'names' => 'required',
            'phone_number' => 'required|min:8',
            'customer_id' => 'required',
        ]);

        $references = PersonalReference::create($request->all());

        return redirect()->route('references.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $references = PersonalReference::find($id);
        return view('references.show', compact('references'));
    }


    public function edit($id)
    {
        $references = PersonalReference::find($id);
        $customers = Customer::all();
        return view('references.edit', compact('references', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'names' => 'required',
            'phone_number' => 'required|min:8'
        ]);
        $references = PersonalReference::find($id);
        $references->update($request->all());
        return redirect()->back()->with('update', 'ok');
    }

    public function destroy($id)
    {
        $references = PersonalReference::find($id);
        $references->delete();
        return redirect()->back()->with('delete', 'ok');
    }
}
