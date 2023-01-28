<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Reserva $reserva)
    {
        $this->middleware('auth');
        $this->reserva = $reserva;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $reservas = $this->reserva->orderBy('data_saida', 'DESC');
        if ($query = request()->query('search')) {
            $reservas->where('local_destino', 'LIKE', '%' . $query . '%');
        }
        $reservas = $reservas->paginate(12);
        return view('home', compact('reservas'));
    }

    public function show($id)
    {
        $reserva = Reserva::whereId($id)->first();
        $vehicles = vehicle::all();

        return view('admin.reservas.show', compact('reserva', 'vehicles'));
    }
}
