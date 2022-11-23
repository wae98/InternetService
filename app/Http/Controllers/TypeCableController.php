<?php

namespace App\Http\Controllers;

use App\Models\CableType;
use Illuminate\Http\Request;

class TypeCableController extends Controller
{
    public function index()
    {
        $typecables = CableType::all();
        return view('typecables.index', compact('typecables'));
    }


    public function create()
    {
        $typecables = CableType::all();

        return view('typecables.create', compact('typecables'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $typecables = CableType::create($request->all());

        return redirect()->route('typecables.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $typecables = CableType::find($id);
        return view('typecables.show', compact('typecables'));
    }


    public function edit($id)
    {
        $typecables = CableType::find($id);
        return view('typecables.edit', compact('typecables', ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $typecables = CableType::find($id);
        $typecables->update($request->all());
        return redirect()->route('typecables.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $typecables = CableType::find($id);
        $typecables->delete();
        return redirect()->route('typecables.index')->with('delete', 'ok');
    }
}
