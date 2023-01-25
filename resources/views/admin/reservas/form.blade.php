@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Requisitar Reserva') }}</div>

                        <div class="card-body">

                            <form action="{{ $action }}" method="POST">
                                {{-- csrf --}}
                                @csrf
                                @isset($reserva)
                                    {{-- verifica se tem dados na variavel --}}
                                    @method('PUT') {{-- se tiver os dados muda o metodo POST para PUT --}}
                                @endisset



                                <div class="form-group row">
                                    <label for="vehicle"
                                        class="col-md-4 col-form-label text-md-right">{{ __('vehicle') }}</label>

                                    <div class="col-md-6">
                                        <select name="vehicle_id" id="vehicle_id" class="form-select form-select-sm">
                                            <option value="" disabled selected>Selecione um veiculo</option>
                                            @foreach ($vehicles as $vehicle)
                                                <option value="{{ $vehicle->id }}"
                                                    {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                                                    {{ $vehicle->modelo }} {{ $vehicle->placa }} </option>
                                            @endforeach
                                        </select>

                                        @error('vehicle_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="data_saida"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Data de Saida ') }}</label>

                                    <div class="col-md-6">
                                        <input type="datetime-local" name="data_saida" id="data_saida"
                                            class="form-control mb-2"
                                            value="{{ old('data_saida', $reserva->data_saida ?? '') }}" />

                                        @error('data_saida')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="data_retorno"
                                        class="col-md-4 col-form-label text-md-right ">{{ __('Data de Retorno ') }}</label>

                                    <div class="col-md-6">
                                        <input type="datetime-local" name="data_retorno" id="data_retorno"
                                            class="form-control mb-2"
                                            value="{{ old('data_retorno', $reserva->data_retorno ?? '') }}" />

                                        @error('data_retorno')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="observacoes"
                                        class="col-md-4 col-form-label text-md-right ">{{ __('Observações do passeio') }}</label>

                                    <div class="col-md-6">
                                        <textarea name="observacoes" id="observacoes" cols="30" rows="5" class="form-control mb-2" value="">
                                            {{ old('observacoes', $reserva->observacoes ?? '') }}</textarea>

                                        @error('observacoes')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="local_saida"
                                        class="col-md-4 col-form-label text-md-right">{{ __('local de saida') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="local_saida" id="local_saida" class="form-control mb-2"
                                            value="{{ old('local_saida', $reserva->local_saida ?? '') }}" />


                                        @error('local_saida')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="local_destino"
                                        class="col-md-4 col-form-label text-md-right">{{ __('local de Destino ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="local_destino" id="local_destino"
                                            class="form-control mb-2"
                                            value="{{ old('local_destino', $reserva->local_destino ?? '') }}" />

                                        @error('local_destino')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="roteiro_viagem"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Roteiro do passeio') }}</label>

                                    <div class="col-md-6">
                                        <textarea name="roteiro_viagem" id="roteiro_viagem" cols="30" rows="5" class="form-control mb-2"
                                            placeholder=" Escreva aqui  seu roteiro de viagem contendo os trechos de viagem de saida e retorno, assim como cidade/Estado onde essa viagem tiver paradas"value="">
                                            {{ old('roteiro_viagem', $reserva->roteiro_viagem ?? '') }}</textarea>


                                        @error('roteiro_viagem')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="check"
                                        class="col-md-4 col-form-label text-md-right">{{ __('check ') }}</label>

                                    <div class="col-md-6">
                                        <select name="check" id="check" class="form-select form-select-sm">
                                            <option value="" disabled selected>verificar aprovação
                                            </option>
                                            <option value="0" {{ old('check') == '0' ? 'selected' : '' }}>aguardar
                                                retorno</option>
                                            <option value="1" {{ old('check') == '0' ? 'selected' : '' }}>Aprovado
                                            </option>

                                        </select>

                                        @error('check')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a class="btn btn-danger" href="{{ route('admin.reservas.index') }}">Cancelar</a>
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Reservar</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
