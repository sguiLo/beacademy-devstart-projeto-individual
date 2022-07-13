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
            <div class="container">
                <a class="nav-item" href="/">
                    <img src="/storage/escudo.png" alt="" width="60">
                </a>
                <ul class="navbar-nav gap-2 mt-2">
                    <li class="nav-item text-white">
                        <h4>CLUBE</h4>
                    </li>
                    <li class="nav-item text-white">
                        <h4>ATLÉTICO</h4>
                    </li>
                    <li class="nav-item text-white">
                        <h4>MINEIRO</h4>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#">
                            <h6>SOBRE</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#">
                            <h6>ELENCO</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>





    <div class="container">
        @yield('content')
    </div>
</body>

</html>