<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = vehicle::all();

        return view('admin.vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.vehicles.store');
        return view('admin.vehicles.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        vehicle::create($request->all());

        $request->session()->flash('sucesso', "Veículo $request->marca $request->modelo cadastrado com sucesso!");

        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = vehicle::find($id);
        $action = route('admin.vehicles.update', $vehicle->id);

        return view('admin.vehicles.form', compact('vehicle', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = vehicle::find($id);
        $vehicle->update($request->all());

        $request->session()->flash('sucesso', "Veículo $request->marca $request->modelo atualizado com sucesso!");

        return redirect()->route('admin.vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        vehicle::destroy($id);

        $request->session()->flash('sucesso', "Veículo excluido com sucesso!");

        return redirect()->route('admin.vehicles.index');
    }
}
