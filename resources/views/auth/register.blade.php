@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 20%">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nome"
                                    class="col-md-4 col-form-label text-md-right">{{ __('nome') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                        class="form-control @error('nome') is-invalid @enderror" name="nome"
                                        value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telefone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="text"
                                        class="form-control @error('telefone') is-invalid @enderror" name="telefone"
                                        value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>

                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data_nasc"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Data de nascimento') }}</label>

                                <div class="col-md-6">
                                    <input id="data_nasc" type="date"
                                        class="form-control @error('data_nasc') is-invalid @enderror" name="data_nasc"
                                        value="{{ old('data_nasc') }}" required autocomplete="data_nasc" autofocus>

                                    @error('data_nasc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cpf"
                                    class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                                <div class="col-md-6">
                                    <input id="cpf" type="text"
                                        class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                        value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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
                                <label for="departamento_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('departamento_id') }}</label>

                                <div class="col-md-6">
                                    <input id="departamento_id" type="number"
                                        class="form-control @error('departamento_id') is-invalid @enderror"
                                        name="departamento_id" value="{{ old('departamento_id') }}" required
                                        autocomplete="departamento_id" autofocus>

                                    @error('departamento_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                            <select name="departamento_id" id="departamento_id">
                                <option value="" disabled selected>Selecione um departamento</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{$departamento->id}}"
                                        {{old('departamento_id')== $departamento->id ? 'selected' : ''}}
                                        > {{$departamento->nome}} </option>
                                @endforeach
                            </select>
                            <label for="departamento_id">Departamentos</label>
                            @error('departamento_id')
                            <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
                        @enderror
                        </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
