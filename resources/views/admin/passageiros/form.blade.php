@extends('layouts.app')

@section('content')
    <section class="section">

        <form action="{{ $action }}" method="POST">
            {{-- csrf --}}
            @csrf
            @isset($passageiro)
                @method('PUT')
            @endisset


            <div class="form-group row">
                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                <div class="col-md-6">
                    <input type="text" name="nome" id="nome" class="form-control mb-2"
                        value="{{ old('nome', $passageiro->nome ?? '') }}" />


                    @error('nome')
                        <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="rg" class="col-md-4 col-form-label text-md-right">{{ __('Rg') }}</label>

                <div class="col-md-6">
                    <input type="text" name="rg" id="rg" class="form-control mb-2"
                        value="{{ old('rg', $passageiro->rg ?? '') }}" />


                    @error('rg')
                        <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="orgao_expedidor"
                    class="col-md-4 col-form-label text-md-right">{{ __('Orgão Expedidor') }}</label>

                <div class="col-md-6">
                    <input type="text" name="orgao_expedidor" id="orgao_expedidor" class="form-control mb-2"
                        value="{{ old('orgao_expedidor', $passageiro->orgao_expedidor ?? '') }}" />


                    @error('orgao_expedidor')
                        <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="poltrona" class="col-md-4 col-form-label text-md-right">{{ __('Poltrona') }}</label>

                <div class="col-md-6">
                    <input type="text" name="poltrona" id="poltrona" class="form-control mb-2"
                        value="{{ old('poltrona', $passageiro->poltrona ?? '') }}" />


                    @error('poltrona')
                        <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <a class="btn btn-danger" href="{{ route('admin.passageiros.index', $reservabus_id) }}">Cancelar</a>
                <button class="btn btn-primary waves-effect waves-light" type="submit">Adicionar</button>
            </div>


        </form>
    </section>
@endsection
