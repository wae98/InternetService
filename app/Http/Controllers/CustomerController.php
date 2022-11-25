<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('can:customers.listar')->only('index');
        $this->middleware('can:customers.editar')->only('edit, update');
        $this->middleware('can:customers.visualizar')->only('show');
        $this->middleware('can:customers.crear')->only('create, store');
        $this->middleware('can:customers.eliminar')->only('destroy');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }


    public function create()
    {
        $sectors = Sector::all();
        $users = User::with("roles")->whereHas("roles", function($q) {
            $q->whereIn("name", ["Cobrador"]);
        })->get();
        return view('customers.create', compact('sectors', 'users'));
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
                'user_id' => $request['user_id'],
            ]
        );
        foreach($request->input('option_text') as $index => $optionText){
            $customers->personalreference()->create(
                [
                    'customer_id' => $customers->id,
                    'names' => $optionText,
                    'phone_number' => $request->input('is_correct.'.$index)
                ]
            );
        }

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
        $users = User::with("roles")->whereHas("roles", function($q) {
            $q->whereIn("name", ["Cobrador"]);
        })->get();
        return view('customers.edit', compact('customers', 'sectors', 'users'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::find($id);
        $customers->update($request->all());
        if ($request->input('option_text') !== null){
            foreach($request->input('option_text') as $index => $optionText){
                $customers->personalreference()->updateOrCreate(
                    [
                        'customer_id' => $customers->id,
                        'names' => $optionText,
                        'phone_number' => $request->input('is_correct.'.$index)
                    ]
                );
            }
        }
        return redirect()->route('customers.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('delete', 'ok');
    }
}
