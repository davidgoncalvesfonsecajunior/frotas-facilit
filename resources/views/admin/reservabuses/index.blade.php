@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar reserva por data..." aria-label="Search"
                    name="search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
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
                @forelse ($reservabuses as $reservabus)
                    <tr>
                        <td class="center-align">{{ $reservabus->vehicle->modelo }} / {{ $reservabus->vehicle->placa }}</td>
                        <td class="center-align">{{ $reservabus->local_saida }}</td>
                        <td class="center-align">{{ $reservabus->data_saida }}</td>
                        <td class="center-align">{{ $reservabus->local_destino }}</td>
                        <td class="center-align">{{ $reservabus->data_retorno }}</td>
                        <td class="center-align">{{ $reservabus->check }}</td>
                        <td class="center-align">

                            <div class="fixed-action-btn">
                                <a class="btn-floating btn-large waves-effect waves-light "
                                    href="{{ route('admin.passageiros.index', $reservabus->id) }}">
                                    <i class="btn btn-lg btn-success mb-2">Passageiros</i>
                                </a>
                            </div>

                            <a href="{{ route('admin.reservabuses.edit', $reservabus->id) }}">
                                <span>
                                    <i class="btn btn-sn btn-primary ">Editar</i>
                                </span>
                            </a>


                            <form action="{{ route('admin.reservabuses.destroy', $reservabus->id) }}" method="post"
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
                        <td colspan="6">Não existem reserva de van ou onibus cadastradas.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.reservabuses.create') }}">
                <i class="btn btn-lg btn-success">reservar Van/Onibus</i>
            </a>
        </div>
    </section>
@endsection
