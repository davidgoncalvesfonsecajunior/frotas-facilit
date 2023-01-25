<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PassageiroRequest;
use App\Models\Passageiro;
use App\Models\Reservabus;
use Illuminate\Http\Request;

class PassageiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $passageiros = Passageiro::where('passageiros.reservabus_id', '=', $id)->get();
        $reservabus_id = $id;

        return view('admin.passageiros.index', compact('passageiros', 'reservabus_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idReserva)
    {
        // dd($idReserva);
        $action = route('admin.passageiros.store', $idReserva);

        $reservabus_id = $idReserva;


        return view('admin.passageiros.form', compact('action', 'reservabus_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PassageiroRequest $request, $idReserva)
    {
        $reservabus_id = Reservabus::find($idReserva);
        $passageiro = $request->all();
        $passageiro = Passageiro::create($passageiro);
        $passageiro->Reservabus()->associate($reservabus_id);


        $passageiro->save();


        $request->session()->flash('sucesso', "passageiro na data $request->nome adicionado!");

        return redirect()->route('admin.passageiros.index', $idReserva);
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
        $passageiro = Passageiro::find($id);
        $action = route('admin.passageiros.update', $passageiro->id);

        return view('admin.passageiros.form', compact('passageiro', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PassageiroRequest $request, $id)
    {
        $passageiros = Passageiro::find($id);
        $passageiros->update($request->all());
        $request->session()->flash('sucesso', "O passageiro $request->nome atualizado com sucesso!");
        $reservabus = passageiro::find($id)->reservabus_id;

        return redirect()->route('admin.passageiros.index', $reservabus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        Passageiro::destroy($id);
        $request->session()->flash('sucesso', "passageiro excluido com sucesso!");


        return redirect()->back();
    }
}
