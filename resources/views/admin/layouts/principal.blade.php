<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FrotasFacilit</title>
</head>

<body>
    {{-- Menu Topo --}}
    <nav class="4caf50 green">
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">IFNMG - Pirapora</a>
                <ul class="right">
                    <li>
                        <a href="{{ route('admin.vehicles.index') }}">Veículos</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.users.index') }}">Usuários</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.departamentos.index') }}">Departamentos</a>
                    </li>
                    <li>
                        <a href="#">Agenda</a>
                    </li>
                    <li>
                        <a href="#">Manutenção</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- conteudo Principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        @if (session('sucesso'))
            M.toast({html: "{{ session('sucesso') }}"})
        @endif


        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>


</body>

</html>
