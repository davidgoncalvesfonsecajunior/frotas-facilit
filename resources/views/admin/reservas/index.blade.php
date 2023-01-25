@extends('layouts.app')

@section('content')
    <section class="section">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="center-align">Veiculo</th>
                    <th class="center-align">Saindo de</th>
                    <th class="center-align">Data</th>
                    <th class="center-align">Destino</th>
                    <th class="center-align">Data</th>
                    <th class="center-align">status</th>
                    <th class="center-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservas as $reserva)
                    <tr>
                        <td class="center-align">{{ $reserva->vehicle->modelo }} / {{ $reserva->vehicle->placa }}</td>
                        <td class="center-align">{{ $reserva->local_saida }}</td>
                        <td class="center-align">{{ $reserva->data_saida }}</td>
                        <td class="center-align">{{ $reserva->local_destino }}</td>
                        <td class="center-align">{{ $reserva->data_retorno }}</td>
                        <td class="center-align">
                            @if ($reserva->check)
                                Aprovada
                            @else
                                Em análise
                            @endif
                        </td>

                        <td class="center-align">

                            <a href="{{ route('admin.reservas.edit', $reserva->id) }}">
                                <span>
                                    <i class="btn btn-sn btn-primary">Editar</i>
                                </span>
                            </a>


                            <form action="{{ route('admin.reservas.destroy', $reserva->id) }}" method="post"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sn btn-danger" style="border: 0;">
                                    <span>Deletar</span>
                                </button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6">Não existem reservas cadastradas.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.reservas.create') }}">
                <i class="btn btn-lg btn-success">Reservar veiculo Oficial</i>
            </a>
        </div>

    </section>
@endsection
