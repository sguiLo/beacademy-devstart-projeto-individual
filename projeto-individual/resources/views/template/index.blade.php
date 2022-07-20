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
                <ul class="navbar-nav mt-2">
                    <li class="nav-item text-white">
                        <h4>CLUBE ATLÉTICO MINEIRO</h4>
                    </li>
                </ul>
                <a class="nav-item" href="/">
                    <img src="/storage/escudo.png" alt="" width="60">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('about.index') }}">
                            <h6>SOBRE</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('players.index') }}">
                            <h6>ELENCO</h6>
                        </a>
                    </li>
                    @if (Auth::user())
                    <li class="nav-item">
                        <a href="{{ route('users.show', Auth::user()->id) }}" class="nav-link active text-white">
                            <h6>{{ Auth::user()->name }}</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-sm btn-outline-light">
                                {{ __('SAIR') }}
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link active text-white">
                            <h6>ENTRAR</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link active text-white">
                            <h6>REGISTRE-SE</h6>
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

</html>