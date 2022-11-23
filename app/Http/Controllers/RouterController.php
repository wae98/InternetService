<?php

namespace App\Http\Controllers;

use App\Models\Router;
use App\Models\StatusRouter;
use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index()
    {
        $routers = Router::all();
        return view('routers.index', compact('routers'));
    }


    public function create()
    {
        $statusRouters = StatusRouter::all();
        return view('routers.create', compact('statusRouters'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'onu_number' => 'required',
            'onu_type' => 'required',
            'mac_address' => 'required',
            'ip_number' => 'required',
            'onu_position' => 'required',
            'identification' => 'required',
            'vlan' => 'required',
            'pon_number' => 'required',
            'slot' => 'required',
            'color_pictel' => 'required',
            'status_router_id' => 'required',
        ]);

        $routers = Router::create($request->all());
        return redirect()->route('routers.index')->with('create', 'ok');
    }

    public function show($id)
    {
        $routers = Router::find($id);

        return view('routers.show', compact('routers'));
    }


    public function edit($id)
    {
        $routers = Router::find($id);
        $statusRouters  =  StatusRouter::all();
        return view('routers.edit', compact('routers', 'statusRouters' ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'onu_number' => 'required',
            'onu_type' => 'required',
            'onu_position' => 'required',
            'mac_address' => 'required',
            'ip_number' => 'required',
            'vlan' => 'required',
            'pon_number' => 'required',
            'slot' => 'required',
            'color_pictel' => 'required',
            'status_router_id' => 'required',
        ]);
        $routers = Router::find($id);
        $routers->update($request->all());
        return redirect()->route('routers.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $routers = Router::find($id);
        $routers->delete();
        return redirect()->route('router.index')->with('delete', 'ok');
    }
}
