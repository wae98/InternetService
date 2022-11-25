<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mufa;
use App\Models\Router;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceProviderController extends Controller
{
    function __construct()
    {
        $this->middleware('can:services.providers.listar')->only('index');
        $this->middleware('can:services.providers.editar')->only('edit, update');
        $this->middleware('can:services.providers.visualizar')->only('show');
        $this->middleware('can:services.providers.crear')->only('create, store');
        $this->middleware('can:services.providers.eliminar')->only('destroy');
    }

    public function index()
    {
        $servicesproviders = ServiceProvider::all();
        return view('servicesproviders.index', compact('servicesproviders'));
    }


    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        $routers = Router::where('status_router_id', 1)->get();
        $mufas = Mufa::where('status', 1)->get();
        return view('servicesproviders.create', compact('customers', 'services', 'routers', 'mufas'));
    }

    public function store(Request $request)
    {

        DB::transaction(
            function () use ($request) {

                $router= Router::find($request['router_id']);
                $router->update(['status_router_id' => 2]);

                $mufas= Mufa::find($request['mufa_id']);
                $mufas->update(['status' => 0]);


                $service = new ServiceProvider();
                $service->customer_id = $request->customer_id;
                $service->service_id = $request->service_id;
                $service->router_id = $request->router_id;
                $service->mufa_id = $request->mufa_id;
                $service->observations = $request->observations;
                $service->status = $request->status;
                $service->user_id = Auth::id();
                $service->save();

            }
        );


        return redirect()->route('servicesproviders.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $servicesproviders = ServiceProvider::find($id);
        return view('servicesproviders.show', compact('servicesproviders'));
    }


    public function edit($id)
    {
        $servicesproviders = ServiceProvider::find($id);
        $customers = Customer::all();
        $services = Service::all();
        $routers = Router::where('status_router_id', 1)->get();
        $mufas = Mufa::where('status', 1)->get();
        return view('servicesproviders.edit', compact('servicesproviders', 'customers', 'services', 'routers', 'mufas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'service_id' => 'required',
            'router_id' => 'required',
            'mufa_id' => 'required',
            'observations' => 'required',
            'status' => 'required',
        ]);
        DB::transaction(
            function () use ($request, $id) {
                $servicesproviders = ServiceProvider::find($id);

                if($request['status'] == 0){
                    $router= Router::find($request['router_id']);
                    $router->update(['status_router_id' => 1]);

                    $mufas= Mufa::find($request['mufa_id']);
                    $mufas->update(['status' => 1]);
                }
                $servicesproviders->update($request->all());
            });

        return redirect()->route('servicesproviders.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        DB::transaction(
            function () use ($id) {
                $servicesproviders = ServiceProvider::find($id);

                $router= Router::find($servicesproviders->router_id);
                $router->update(['status_router_id' => 1]);

                $mufas= Mufa::find($servicesproviders->mufa_id);
                $mufas->update(['status' => 1]);
                $servicesproviders->delete();
            });
        return redirect()->route('servicesproviders.index')->with('delete', 'ok');
    }
}
