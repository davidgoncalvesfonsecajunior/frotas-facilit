<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservabusRequest;
use App\Models\Reservabus;
use App\Models\vehicle;
use Illuminate\Http\Request;

class ReservabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservabuses = auth()->user()->reservabuses;

        if ($query = request()->query('search')) {
            $reservabuses->where('data_saida', 'LIKE', '%' . $query . '%');
        }

        $vehicles = vehicle::all();


        return view('admin.reservabuses.index', compact('reservabuses', 'vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = vehicle::all();

        $action = route('admin.reservabuses.store');
        return view('admin.reservabuses.form', compact('action', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservabusRequest $request)
    {
        $reservabus = $request->all();
        $reservabus = Reservabus::create($reservabus);
        $reservabus->owner()->associate(auth()->User());
        $reservabus->save();


        $request->session()->flash('sucesso', "Reserva de Van/Onibus na data $request->data_saida  aguardando aprovação!");

        return redirect()->route('admin.reservabuses.index');
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
        $reservabus = Reservabus::find($id);
        $vehicles = vehicle::all();
        $action = route('admin.reservabuses.update', $reservabus->id);


        return view('admin.reservabuses.form', compact('reservabus', 'action', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservabusRequest $request, $id)
    {
        $reservabus = Reservabus::find($id);
        $reservabus->update($request->all());

        $request->session()->flash('sucesso', "Pedido de reserva Van/Onibus data $request->data_saida atualizado com sucesso!");

        return redirect()->route('admin.reservabuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Reservabus::destroy($id);

        $request->session()->flash('sucesso', "Pedido de reserva Van/Onibus deletado com sucesso!");

        return redirect()->route('admin.reservabuses.index');
    }
}
