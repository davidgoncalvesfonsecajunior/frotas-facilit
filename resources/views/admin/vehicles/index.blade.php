@extends('layouts.app')

@section('content')
    <section class="section">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="center-align">Placa</th>

                    <th class="center-align">Marca</th>
                    <th class="center-align">Modelo</th>
                    <th class="center-align">Categoria</th>


                    <th class="center-align">Status</th>

                    <th class="center-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vehicles as $vehicle)
                    <tr>
                        <td class="center-align">{{ $vehicle->placa }}</td>
                        <td class="center-align">{{ $vehicle->marca }}</td>
                        <td class="center-align">{{ $vehicle->modelo }}</td>
                        <td class="center-align">{{ $vehicle->categoria->nome }}</td>
                        <td class="center-align">
                            @if ($vehicle->status)
                                Indisponível
                            @else
                                Disponível
                            @endif

                        </td>


                        <td class="center-align">
                            <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}">
                                <span>
                                    <i class="btn btn-sn btn-primary">Editar</i>
                                </span>
                            </a>


                            <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="post"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sn btn-danger" style="border: 0;">
                                    <span>Deletar</span>
                                </button>
                            </form>

                            {{-- <a href="{{ route('admin.reservas.create', $vehicle->id) }}">
                                <span>
                                    <i class="btn btn-info">Reservar</i>
                                </span>
                            </a> --}}

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
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.vehicles.create') }}">
                <i class="btn btn-lg btn-success">Adicionar</i>
            </a>
        </div>
    </section>
@endsection
