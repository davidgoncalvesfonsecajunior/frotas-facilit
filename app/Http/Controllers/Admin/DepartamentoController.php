<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartamentoRequest;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();

        return view('admin.departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.departamentos.store');
        return view('admin.departamentos.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request)
    {
        Departamento::create($request->all());

        $request->session()->flash('sucesso', "O departamento $request->nome cadastrado com sucesso!");

        return redirect()->route('admin.departamentos.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);
        $action = route('admin.departamentos.update', $departamento->id);

        return view('admin.departamentos.form', compact('departamento', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoRequest $request, $id)
    {
        $departamentos = Departamento::find($id);
        $departamentos->update($request->all());
        $request->session()->flash('sucesso', "O departamento $request->nome atualizado com sucesso!");

        return redirect()->route('admin.departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Departamento::destroy($id);
        $request->session()->flash('sucesso', "Departamento excluido com sucesso!");

        return redirect()->route('admin.departamentos.index');
    }
}
