@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Adicionar Veiculo') }}</div>

                        <div class="card-body">

                            <form action="{{ $action }}" method="POST">
                                {{-- csrf --}}
                                @csrf
                                @isset($vehicle)
                                    {{-- verifica se tem dados na variavel --}}
                                    @method('PUT') {{-- se tiver os dados muda o metodo POST para PUT --}}
                                @endisset


                                <div class="form-group row">
                                    <label for="placa"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Placa ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="placa" id="placa" class="form-control"
                                            value="{{ old('placa', $vehicle->placa ?? '') }}" />

                                        @error('placa')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="chassi"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Chassi ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="chassi" id="chassi" class="form-control"
                                            value="{{ old('chassi', $vehicle->chassi ?? '') }}" />

                                        @error('chassi')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="marca"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Marca ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="marca" id="marca" class="form-control"
                                            value="{{ old('marca', $vehicle->marca ?? '') }}" />

                                        @error('marca')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="categoria"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Categoria ') }}</label>

                                    <div class="col-md-6">
                                        <select name="categoria_id" id="categoria_id" class="form-select form-select-sm">
                                            <option value="" disabled selected>Selecione uma categoria</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nome }} </option>
                                            @endforeach
                                        </select>

                                        @error('categoria_id')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="modelo"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Modelo ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="modelo" id="modelo" class="form-control"
                                            value="{{ old('modelo', $vehicle->modelo ?? '') }}" />

                                        @error('modelo')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ano"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Ano ') }}</label>

                                    <div class="col-md-6">
                                        <input type="number" name="ano" id="ano" class="form-control"
                                            value="{{ old('ano', $vehicle->ano ?? '') }}" />

                                        @error('ano')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cor"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Cor ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="cor" id="cor" class="form-control"
                                            value="{{ old('cor', $vehicle->cor ?? '') }}" />

                                        @error('cor')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="combustivel"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Combustivel') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="combustivel" id="combustivel" class="form-control"
                                            value="{{ old('combustivel', $vehicle->combustivel ?? '') }}" />

                                        @error('combustivel')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="km"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Quilometragem ') }}</label>

                                    <div class="col-md-6">
                                        <input type="number" name="km" id="km" class="form-control"
                                            value="{{ old('km', $vehicle->km ?? '') }}" />

                                        @error('km')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="status"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Status ') }}</label>

                                    <div class="col-md-6">
                                        <select name="status" id="status" class="form-select form-select-sm">
                                            <option value="" disabled selected>Selecione o status de disponibilidade do
                                                veiculo
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Disponivel
                                            </option>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ocupado
                                            </option>

                                        </select>

                                        @error('status')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="observacao"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Observação ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="observacao" id="observacao" class="form-control"
                                            value="{{ old('observacao', $vehicle->observacao ?? '') }}" />

                                        @error('observacao')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a class="btn btn-danger" href="{{ route('admin.vehicles.index') }}">Cancelar</a>
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Salvar</button>
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
