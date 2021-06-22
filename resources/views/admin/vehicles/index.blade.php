@extends('admin.layouts.principal')

@section('conteudo-principal')
<section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th>Placa</th>
                <th class="right-align">Chassi</th>
                <th class="right-align">Marca</th>
                <th class="right-align">Modelo</th>
                <th class="right-align">Ano</th>
                <th class="right-align">Cor</th>
                <th class="right-align">Combustivel</th>
                <th class="right-align">KM</th>
                <th class="right-align">Status</th>
                <th class="right-align">Observação</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $vehicle )
            <tr>
                <td>{{$vehicle->placa}}</td>
                <td class="right-align">{{$vehicle->chassi}}</td>
                <td class="right-align">{{$vehicle->marca}}</td>
                <td class="right-align">{{$vehicle->modelo}}</td>
                <td class="right-align">{{$vehicle->ano}}</td>
                <td class="right-align">{{$vehicle->cor}}</td>
                <td class="right-align">{{$vehicle->combustivel}}</td>
                <td class="right-align">{{$vehicle->km}}</td>
                <td class="right-align">
                    @if ($vehicle->status)
                        Indisponível
                    @else
                        Disponível
                    @endif

                </td>
                <td class="right-align">{{$vehicle->observacao}}</td>

                <td class="right-align">
                    <a href="{{route('admin.vehicles.formEditar', $vehicle->id)}}">
                        <span>
                            <i class="material-icons blue-text text-accent-2">edit</i>
                        </span>
                    </a>


                    <form action="{{route('admin.vehicles.deletar', $vehicle->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button style="border: 0 ; background: transparent ;" type="submit">
                            <span style="cursor: pointer">
                                <i class="material-icons red-text text-accent-3">delete_forever</i>
                            </span>
                        </button>
                    </form>

                </td>
            </tr>

            @empty
                <tr>
                    <td colspan="10">Não existem veículos cadastrados.</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.vehicles.form')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>

@endsection
