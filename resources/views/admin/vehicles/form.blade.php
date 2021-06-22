@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">

    <form action="{{$action}}" method="POST">
        {{-- csrf --}}
        @csrf
        @isset($vehicle) {{--verifica se tem dados na variavel --}}
            @method('PUT') {{--se tiver os dados muda o metodo POST para PUT--}}
        @endisset


        <div class="input-field">
            <input type="text" name="placa" id="placa" value="{{old('placa', $vehicle->placa ?? '')}}"/>
            <label for="placa">Placa</label>
            @error('placa')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="chassi" id="chassi" value="{{old('chassi', $vehicle->chassi ?? '')}}"/>
            <label for="chassi">Chassi</label>
            @error('chassi')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="marca" id="marca" value="{{old('marca', $vehicle->marca ?? '')}}" />
            <label for="marca">Marca</label>
            @error('marca')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="modelo" id="modelo" value="{{old('modelo', $vehicle->modelo ?? '')}}"/>
            <label for="modelo">Modelo</label>
            @error('modelo')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="number" name="ano" id="ano"  value="{{old('ano', $vehicle->ano ?? '')}}"/>
            <label for="ano">Ano</label>
            @error('ano')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="cor" id="cor" value="{{old('cor', $vehicle->cor ?? '')}}"/>
            <label for="cor">Cor</label>
            @error('cor')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="combustivel" id="combustivel" value="{{old('combustivel', $vehicle->combustivel ?? '')}}"/>
            <label for="combustivel">Combustivel</label>
            @error('combustivel')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="number" name="km" id="km" value="{{old('km', $vehicle->km ?? '')}}"/>
            <label for="km">Km</label>
            @error('km')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="number" name="status" id="status" value="{{old('status', $vehicle->status ?? '')}}" placeholder="0->disponivel - 1->indisponivel "/>
            <label for="status">status</label>
            @error('status')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        {{-- <div class="input-field">
            <select name="status" id="status">
                <option value="0">Disponivel</option>
                <option value="1">Ocupado</option>

            </select>
            <label for="status">selecione o status do veiculo</label>
        </div> --}}






        <div class="input-field">
            <input type="text" name="observacao" id="observacao" value="{{old('observacao', $vehicle->observacao ?? '')}}"/>
            <label for="observacao" >Observação</label>
            @error('observacao')
                <span class="red-text text-accent-3"> <small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="right-align">
            <a class="btn-flat waves-effect" href="{{route('admin.vehicles.listar')}}">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">Salvar</button>
        </div>


    </form>
</section>

@endsection
