<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
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
                        <a href="{{route('admin.vehicles.index')}}">Veículos</a>
                    </li>

                    <li>
                        <a href="#">Usuários</a>
                    </li>
                    <li>
                        <a href="#">Departamentos</a>
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

    <script>
         @if (session('sucesso'))
    M.toast({html: "{{session('sucesso')}}"})

    @endif


         document.addEventListener('DOMContentLoaded', function() {
         var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
  });
    </script>


</body>
</html>
