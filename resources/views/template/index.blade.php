<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container justify-content-between">
                <a class="nav-item" href="/">
                    <img src="{{'storage/escudo.png'}}" alt="" width="60">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('about.index') }}">
                            <h6>Sobre</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('players.index') }}">
                            <h6>Elenco</h6>
                        </a>
                    </li>
                    @if (Auth::user() && Auth::user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('users.index') }}">
                            <h6>Usuários</h6>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user())
                    <li class="nav-item">
                        <a href="{{ route('users.show', Auth::user()->id) }}" class="nav-link active text-white">
                            <h6 class="text-decoration-underline">{{ strtok(Auth::user()->name, " ") }}</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-sm btn-outline-light mt-1">
                                {{ __('sair') }}
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link active text-white">
                            <h6>Entrar</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link active text-white">
                            <h6>Registre-se</h6>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>