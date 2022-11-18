<?php

namespace App\Http\Controllers;

use App\Models\StatusRouter;
use Illuminate\Http\Request;

class StatusRouterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusRouter = StatusRouter::all();
        return view('statusRouters.index', compact('statusRouter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statusRouters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $status = StatusRouter::create($request->all());
        return redirect()->route('statusRouters.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = StatusRouter::find($id);

        return view('statusRouters.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = StatusRouter::find($id);
        return view('statusRouters.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $status = StatusRouter::find($id);
        $status->update($request->all());
        return redirect()->route('statusRouters.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = StatusRouter::find($id);
        $status->delete();
        return redirect()->route('statusRouters.index')->with('delete', 'ok');
    }
}
