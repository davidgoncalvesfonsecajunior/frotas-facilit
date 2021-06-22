<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\vehicle;

use App\Http\Requests\VehicleRequest;

use Illuminate\Http\Request;


class VehicleController extends Controller
{
    public function vehicles()
    {

        $vehicles = vehicle::all();

        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function formAddVehicles()
    {
        $action = route('admin.vehicles.adicionar');
        return view('admin.vehicles.form', compact('action'));
    }

    public function adicionar(VehicleRequest $request)
    {
        //criar um objeto do modelo da clase veiculo

        vehicle::create($request->all());

        $request->session()->flash('sucesso', "Veículo $request->marca $request->modelo cadastrado com sucesso!");

        return redirect()->route('admin.vehicles.listar');
    }

    public function deletar($id, Request $request)
    {
        vehicle::destroy($id);

        $request->session()->flash('sucesso', "Veículo excluido com sucesso!");

        return redirect()->route('admin.vehicles.listar');
    }

    public function formEditar($id)
    {
        $vehicle = vehicle::find($id);
        $action = route('admin.vehicles.editar', $vehicle->id);

        return view('admin.vehicles.form', compact('vehicle', 'action'));
    }

    public function editar(VehicleRequest $request, $id)
    {
        $vehicle = vehicle::find($id);
        $vehicle->update($request->all());

        $request->session()->flash('sucesso', "Veículo $request->marca $request->modelo atualizado com sucesso!");

        return redirect()->route('admin.vehicles.listar');
    }
}
