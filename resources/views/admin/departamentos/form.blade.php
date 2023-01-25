@extends('layouts.app')

@section('content')
    <section class="section">

        <form action="{{ $action }}" method="POST">
            {{-- csrf --}}
            @csrf
            @isset($departamento)
                @method('PUT')
            @endisset


            <div class="mb-3">
                <label for="nome" class="form-label">Departamento</label>
                <input type="text" name="nome" id="nome" class="form-control"
                    value="{{ old('nome', $departamento->nome ?? '') }}" />

                @error('nome')
                    <span class="red-text text-accent-3"> <small>{{ $message }}</small></span>
                @enderror

            </div>


            <div class="mb-3">
                <a class="btn btn-danger" href="{{ route('admin.departamentos.index') }}">Cancelar</a>
                <button class="btn btn-primary waves-effect waves-light" type="submit">Adicionar</button>
            </div>


        </form>
    </section>
@endsection
