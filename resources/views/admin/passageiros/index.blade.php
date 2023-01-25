@extends('layouts.app')

@section('content')
    <section class="section">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>Orgão Expedidor</th>
                    <th>Poltrona</th>
                    <th class="center-align">Opções</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($passageiros as $passageiro)
                    <tr>
                        <td>{{ $passageiro->nome }}</td>
                        <td>{{ $passageiro->rg }}</td>
                        <td>{{ $passageiro->orgao_expedidor }}</td>
                        <td>{{ $passageiro->poltrona }}</td>


                        <td class="center-align">
                            <a href="{{ route('admin.passageiros.edit', $passageiro->id) }}">
                                <span style="cursor: pointer">
                                    <i class="btn btn-sn btn-primary">Editar</i>
                                </span>
                            </a>


                            <form action="{{ route('admin.passageiros.destroy', $passageiro->id) }}" method="post"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sn btn-danger" style="border: 0;">
                                    <span style="cursor: pointer">
                                        Deletar
                                    </span>
                                </button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5">Não existem passageiros cadastrados.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light"
                href="{{ route('admin.passageiros.create', $reservabus_id) }}">
                <i class="btn btn-lg btn-success">Adicionar</i>
            </a>
        </div>
    </section>
@endsection
