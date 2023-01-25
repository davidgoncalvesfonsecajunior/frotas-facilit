<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservaRequest;
use App\Models\Reserva;
use App\Models\User;
use App\Models\vehicle;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $reservas = auth()->user()->reservas;

        $vehicles = vehicle::all();


        return view('admin.reservas.index', compact('reservas', 'vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        $vehicles = vehicle::all();

        $action = route('admin.reservas.store');
        return view('admin.reservas.form', compact('action', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservaRequest $request)
    {
        $reserva = $request->all();
        $reserva = Reserva::create($reserva);
        $reserva->owner()->associate(auth()->User());
        $reserva->save();


        $request->session()->flash('sucesso', "Reserva na data $request->data_saida  aguardando aprovação!");

        return redirect()->route('admin.reservas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::find($id);
        $vehicles = vehicle::all();
        $action = route('admin.reservas.update', $reserva->id);


        return view('admin.reservas.form', compact('reserva', 'action', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(reservaRequest $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->update($request->all());

        $request->session()->flash('sucesso', "Pedido de reserva data $request->data_saida atualizado com sucesso!");

        return redirect()->route('admin.reservas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Reserva::destroy($id);

        $request->session()->flash('sucesso', "Pedido de reserva deletado com sucesso!");

        return redirect()->route('admin.reservas.index');
    }
}
