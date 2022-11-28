<?php

namespace App\Http\Controllers;

use App\Models\PaymentService;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentServiceController extends Controller
{
    function __construct()
    {
        $this->middleware('can:payments.services.listar')->only('index');
        $this->middleware('can:payments.services.editar')->only('edit, update');
        $this->middleware('can:payments.services.visualizar')->only('show');
        $this->middleware('can:payments.services.crear')->only('create, store');
        $this->middleware('can:payments.services.eliminar')->only('destroy');
    }

    public function index()
    {
        $payments = PaymentService::all();
        return view('payments.index', compact('payments'));
    }


    public function create()
    {
        $serviceproviders = ServiceProvider::where('status',1)->get();
        return view('payments.create', compact('serviceproviders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'service_provider_id' => 'required',
            'observations' => 'required',
            'total' => 'required|min:2',
            'date' => 'required'
        ]);

        $payments = PaymentService::create(
            [
                'date' =>  $request['date'],
                'observations' =>  $request['observations'],
                'total' =>  $request['total'],
                'service_provider_id' =>  $request['service_provider_id'],
                'user_id' => Auth::id(),
            ]
        );

        return redirect()->route('paymentservices.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $payments = PaymentService::find($id);
        return view('payments.show', compact('payments'));
    }


    public function edit($id)
    {
        $payments = PaymentService::find($id);
        $serviceproviders = ServiceProvider::where('status',1)->get();
        return view('payments.edit', compact('serviceproviders', 'payments'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'service_provider_id' => 'required',
            'observations' => 'required',
            'total' => 'required|min:2',
            'date' => 'required'
        ]);

        $payments = PaymentService::find($id);
        $payments->update($request->all());
        return redirect()->route('paymentservices.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $payments = PaymentService::find($id);
        $payments->delete();
        return redirect()->route('paymentservices.index')->with('delete', 'ok');
    }
}
