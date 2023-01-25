@extends('layouts.app')

@section('content')
    <section class="section">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="center-align">Nome</th>

                    <th class="center-align">Departamento</th>

                    <th class="center-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="center-align">{{ $user->nome }}</td>
                        <td class="center-align">{{ $user->departamento->nome }}</td>

                        <td class="center-align">
                            <a href="{{ route('admin.users.edit', $user->id) }}">
                                <span>
                                    <i class="btn btn-sn btn-primary">Editar</i>
                                </span>
                            </a>


                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
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
                        <td colspan="10">Não existem Usuarios cadastrados.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{ route('admin.users.create') }}">
                <i class="btn btn-lg btn-success">Adicionar</i>
            </a>
        </div>


    </section>

    {{ $users->links() }}
@endsection
