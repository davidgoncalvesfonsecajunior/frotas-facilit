@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Requisitar reserva Van/Onibus') }}</div>

                        <div class="card-body">

                            <form action="{{ $action }}" method="POST">
                                {{-- csrf --}}
                                @csrf
                                @isset($reservabus)
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

                                {{-- Sobre a Viagem --}}

                                <label class="col-md-12 col-form-label text-md-right">{{ __('Sobre a viagem ') }}</label>

                                <div class="form-group row">
                                    <label for="local_saida"
                                        class="col-md-4 col-form-label text-md-right">{{ __('local de saida') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="local_saida" id="local_saida" class="form-control mb-2"
                                            value="{{ old('local_saida', $reservabus->local_saida ?? '') }}" />


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
                                            value="{{ old('local_destino', $reservabus->local_destino ?? '') }}" />

                                        @error('local_destino')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="data_saida"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Data de Saida ') }}</label>

                                    <div class="col-md-6">
                                        <input type="datetime-local" name="data_saida" id="data_saida"
                                            class="form-control mb-2"
                                            value="{{ old('data_saida', $reservabus->data_saida ?? '') }}" />

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
                                            value="{{ old('data_retorno', $reservabus->data_retorno ?? '') }}" />

                                        @error('data_retorno')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="data_chegada"
                                        class="col-md-4 col-form-label text-md-right ">{{ __('Data de Chegada ') }}</label>

                                    <div class="col-md-6">
                                        <input type="datetime-local" name="data_chegada" id="data_chegada"
                                            class="form-control mb-2"
                                            value="{{ old('data_chegada', $reservabus->data_chegada ?? '') }}" />

                                        @error('data_chegada')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="Passageiros"
                                        class="col-md-4 col-form-label text-md-right ">{{ __('Passageiros ') }}</label>

                                    <div class="col-md-6">
                                        <input type="number" name="Passageiros" id="Passageiros" class="form-control mb-2"
                                            value="{{ old('Passageiros', $reservabus->Passageiros ?? '') }}" />

                                        @error('passageiros')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="km"
                                        class="col-md-4 col-form-label text-md-right ">{{ __('km ') }}</label>

                                    <div class="col-md-6">
                                        <input type="number" name="km" id="km" class="form-control mb-2"
                                            value="{{ old('km', $reservabus->km ?? '') }}" />

                                        @error('km')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="finalidade"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Finalidade ') }}</label>

                                    <div class="col-md-6">
                                        <select name="finalidade" id="finalidade" class="form-select form-select-sm">
                                            <option value="" disabled selected>Existe finalidade?
                                            </option>
                                            <option value="administrativa"
                                                {{ old('finalidade') == 'administrativa' ? 'selected' : '' }}>
                                                administrativa</option>

                                            <option value="atividade de extensão e/ou serviço a comunidade"
                                                {{ old('finalidade') == 'atividade de extensão e/ou serviço a comunidade' ? 'selected' : '' }}>
                                                atividade de extensão e/ou serviço a comunidade
                                            </option>

                                            <option value="congressos, simpósios e/ou fóruns"
                                                {{ old('finalidade') == 'congressos, simpósios e/ou fóruns' ? 'selected' : '' }}>
                                                congressos, simpósios e/ou fóruns
                                            </option>

                                            <option value="didatica e/ou cientifica"
                                                {{ old('finalidade') == 'didatica e/ou cientifica' ? 'selected' : '' }}>
                                                didatica e/ou cientifica
                                            </option>

                                        </select>

                                        @error('finalidade')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="diaria"
                                        class="col-md-4 col-form-label text-md-right">{{ __('diaria') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="diaria" id="diaria" class="form-control mb-2"
                                            value="{{ old('diaria', $reservabus->diaria ?? '') }}" />


                                        @error('diaria')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="motorista"
                                        class="col-md-4 col-form-label text-md-right">{{ __('motorista') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="motorista" id="motorista" class="form-control mb-2"
                                            value="{{ old('motorista', $reservabus->motorista ?? '') }}" />


                                        @error('motorista')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>


                                {{-- sobre o local do evento --}}

                                <label
                                    class="col-md-4 col-form-label text-md-right ">{{ __('Sobre o local do evento') }}</label>

                                <div class="form-group row">
                                    <label for="nome_local"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Local do evento') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nome_local" id="nome_local"
                                            class="form-control mb-2"
                                            value="{{ old('nome_local', $reservabus->nome_local ?? '') }}" />


                                        @error('nome_local')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="endereco"
                                        class="col-md-4 col-form-label text-md-right">{{ __('endereço') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="endereco" id="endereco" class="form-control mb-2"
                                            value="{{ old('endereco', $reservabus->endereco ?? '') }}" />


                                        @error('endereco')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cidade"
                                        class="col-md-4 col-form-label text-md-right">{{ __('cidade') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="cidade" id="cidade" class="form-control mb-2"
                                            value="{{ old('cidade', $reservabus->cidade ?? '') }}" />


                                        @error('cidade')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="uf"
                                        class="col-md-4 col-form-label text-md-right">{{ __('uf') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="uf" id="uf" class="form-control mb-2"
                                            value="{{ old('uf', $reservabus->uf ?? '') }}" />


                                        @error('uf')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="contato"
                                        class="col-md-4 col-form-label text-md-right">{{ __('contato') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="contato" id="contato" class="form-control mb-2"
                                            value="{{ old('contato', $reservabus->contato ?? '') }}" />


                                        @error('contato')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="email" id="email" class="form-control mb-2"
                                            value="{{ old('email', $reservabus->email ?? '') }}" />


                                        @error('email')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="estacionamento"
                                        class="col-md-4 col-form-label text-md-right">{{ __('estacionamento ') }}</label>

                                    <div class="col-md-6">
                                        <select name="estacionamento" id="estacionamento"
                                            class="form-select form-select-sm">
                                            <option value="" disabled selected>Existe estacionamento?
                                            </option>
                                            <option value="Sim. (Pago)"
                                                {{ old('estacionamento') == 'Sim. (Pago)' ? 'selected' : '' }}>Sim. (Pago)
                                            </option>
                                            <option value="Sim. (Gratis)"
                                                {{ old('estacionamento') == 'Sim. (Gratis)' ? 'selected' : '' }}>Sim.
                                                (Gratis)
                                            </option>
                                            <option value="Não" {{ old('estacionamento') == 'Não' ? 'selected' : '' }}>
                                                Não
                                            </option>

                                        </select>

                                        @error('estacionamento')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="roteiro"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Roteiro de Viagem') }}</label>
                                    <div class="col-md-6">
                                        <textarea name="roteiro" id="roteiro" cols="30" rows="5" class="form-control mb-2" value="">
                                            {{ old('roteiro', $reservabus->roteiro ?? '') }}</textarea>
                                        @error('roteiro')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="objetivo"
                                        class="col-md-4 col-form-label text-md-right ">{{ __('Objetivo do passeio') }}</label>

                                    <div class="col-md-6">
                                        <textarea name="objetivo" id="objetivo" cols="30" rows="5" class="form-control mb-2" value="">
                                            {{ old('objetivo', $reservabus->objetivo ?? '') }}</textarea>

                                        @error('objetivo')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="disciplinas"
                                        class="col-md-4 col-form-label text-md-right">{{ __('disciplinas envolvidas') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="disciplinas" id="disciplinas"
                                            class="form-control mb-2"
                                            value="{{ old('disciplinas', $reservabus->disciplinas ?? '') }}" />


                                        @error('disciplinas')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="publico"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Publico alvo') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="publico" id="publico" class="form-control mb-2"
                                            value="{{ old('publico', $reservabus->publico ?? '') }}" />


                                        @error('publico')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="servidores"
                                        class="col-md-4 col-form-label text-md-right">{{ __('servidores que vaiajarão') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="servidores" id="servidores"
                                            class="form-control mb-2"
                                            value="{{ old('servidores', $reservabus->servidores ?? '') }}" />


                                        @error('servidores')
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
                                            <option value="Aguardar
                                            retorno"
                                                {{ old('check') ==
                                                'Aguardar
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            retorno'
                                                    ? 'selected'
                                                    : '' }}>
                                                Aguardar
                                                retorno</option>

                                            <option value="Aprovado" {{ old('check') == 'Aprovado' ? 'selected' : '' }}>
                                                Aprovado
                                            </option>

                                            <option value="Negado" {{ old('check') == 'Negado' ? 'selected' : '' }}>Negado
                                            </option>

                                        </select>

                                        @error('check')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a class="btn btn-danger"
                                            href="{{ route('admin.reservabuses.index') }}">Cancelar</a>
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Reservar
                                            Van/Onibus</button>
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
