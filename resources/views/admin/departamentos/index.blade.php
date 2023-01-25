@extends('layouts.app')

@section('content')
    <section class="section">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th class="center-align">Opções</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->nome }}</td>


                        <td class="center-align">
                            <a href="{{ route('admin.departamentos.edit', $departamento->id) }}">
                                <span style="cursor: pointer">
                                    <i class="btn btn-sn btn-primary">Editar</i>
                                </span>
                            </a>


                            <form action="{{ route('admin.departamentos.destroy', $departamento->id) }}" method="post"
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
                        <td colspan="2">Não existem Departamentos cadastrados.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.departamentos.create') }}">
                <i class="btn btn-lg btn-success">Adicionar</i>
            </a>
        </div>
    </section>
@endsection
