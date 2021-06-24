@extends('admin.layouts.principal')

@section('conteudo-principal')
<section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th class="center-align">Placa</th>
                <th class="center-align">Chassi</th>
                <th class="center-align">Marca</th>
                <th class="center-align">Modelo</th>
                <th class="center-align">Ano</th>
                <th class="center-align">Cor</th>
                <th class="center-align">Combustivel</th>
                <th class="center-align">KM</th>
                <th class="center-align">Status</th>
                <th class="center-align">Observação</th>
                <th class="center-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $vehicle )
            <tr>
                <td class="center-align">{{$vehicle->placa}}</td>
                <td class="center-align">{{$vehicle->chassi}}</td>
                <td class="center-align">{{$vehicle->marca}}</td>
                <td class="center-align">{{$vehicle->modelo}}</td>
                <td class="center-align">{{$vehicle->ano}}</td>
                <td class="center-align">{{$vehicle->cor}}</td>
                <td class="center-align">{{$vehicle->combustivel}}</td>
                <td class="center-align">{{$vehicle->km}}</td>
                <td class="center-align">
                    @if ($vehicle->status)
                        Indisponível
                    @else
                        Disponível
                    @endif

                </td>
                <td class="center-align">{{$vehicle->observacao}}</td>

                <td class="center-align">
                    <a href="{{route('admin.vehicles.edit', $vehicle->id)}}">
                        <span>
                            <i class="material-icons blue-text text-accent-2">edit</i>
                        </span>
                    </a>


                    <form action="{{route('admin.vehicles.destroy', $vehicle->id)}}" method="post" style="display: inline;">
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
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.vehicles.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>

@endsection
