<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }


    public function create()
    {
        $sectors = Sector::all();
        return view('customers.create', compact('sectors'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'names' => 'required',
            'phone_number' => 'required|min:8',
            'address' => 'required',
            'references_address' => 'required',
            'sector_id' => 'required',
        ]);

        $customers = Customer::create(
            [
                'names' =>  $request['names'],
                'phone_number' =>  $request['phone_number'],
                'address' =>  $request['address'],
                'references_address' =>  $request['references_address'],
                'sector_id' => $request['sector_id'],
                'user_id' => Auth::id(),
            ]
        );

        return redirect()->route('customers.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $customers = Customer::find($id);
        return view('customers.show', compact('customers'));
    }


    public function edit($id)
    {
        $customers = Customer::find($id);
        $sectors = Sector::all();
        return view('customers.edit', compact('customers', 'sectors'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::find($id);
        $customers->update($request->all());
        return redirect()->route('customers.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('delete', 'ok');
    }
}
