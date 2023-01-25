@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Adicionar usuario') }}</div>

                        <div class="card-body">

                            <form action="{{ $action }}" method="POST">
                                {{-- csrf --}}
                                @csrf
                                @isset($user)
                                    {{-- verifica se tem dados na variavel --}}
                                    @method('PUT') {{-- se tiver os dados muda o metodo POST para PUT --}}
                                @endisset


                                <div class="form-group row">
                                    <label for="nome"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="nome" id="nome" class="form-control"
                                            value="{{ old('nome', $user->nome ?? '') }}" />

                                        @error('nome')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Email ') }}</label>

                                    <div class="col-md-6">
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email', $user->email ?? '') }}" />

                                        @error('email')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Senha ') }}</label>

                                    <div class="col-md-6">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password', $user->password ?? '') }}" required
                                            autocomplete="new-password" />

                                        @error('password')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Telefone ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="telefone" id="telefone" class="form-control"
                                            value="{{ old('telefone', $user->telefone ?? '') }}" />

                                        @error('telefone')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="data_nasc"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Data de Nascimento ') }}</label>

                                    <div class="col-md-6">
                                        <input type="date" name="data_nasc" id="data_nasc" class="form-control"
                                            value="{{ old('data_nasc', $user->data_nasc ?? '') }}" />

                                        @error('data_nasc')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cpf"
                                        class="col-md-4 col-form-label text-md-right">{{ __('CPF ') }}</label>

                                    <div class="col-md-6">
                                        <input type="text" name="cpf" id="cpf" class="form-control"
                                            value="{{ old('cpf', $user->cpf ?? '') }}" />

                                        @error('cpf')
                                            <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="departamento"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>

                                    <div class="col-md-6">
                                        <select name="departamento_id" id="departamento_id"
                                            class="form-select form-select-sm">
                                            <option value="" disabled selected>Selecione um departamento</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}"
                                                    {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                                    {{ $departamento->nome }} </option>
                                            @endforeach
                                        </select>

                                        @error('departamento_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a class="btn btn-danger" href="{{ route('admin.users.index') }}">Cancelar</a>

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
