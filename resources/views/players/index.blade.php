@extends('template.index')
@section('title', 'ELENCO')

@section('content')


<div>
    <h1 class="mt-5">Elenco do <span class="text-warning">GALO</span></h1>
    @if (session()->has('destroy'))
    <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
        <strong>Atenção!</strong> {{ session()->get('destroy') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('update'))
    <div class="alert alert-dark alert-dismissible fade show w-75" role="alert">
        <strong>Atenção!</strong> {{ session()->get('update') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('create'))
    <div class="alert alert-dark alert-dismissible fade show w-75" role="alert">
        <strong>Atenção!</strong> {{ session()->get('create') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        @if (Auth::user() && Auth::user()->is_admin == 1)
        <div class="col-sm mt-2 mb-1">
            <a href="{{ route('players.create') }}" class="btn btn-outline-dark">Novo Jogador</a>
        </div>
        @endif
    </div>

    <h3 class="mt-5">GOLEIROS</h3>
    <div class="row row-cols-md-3 ms-5 mt-3">
        @foreach ($players as $player)
        @if ($player->position == 'Goleiro')
        <div class="col mt-3">
            <div class="card text-center" style="width: 18rem;">
                @if ($player->photo)
                <img class="card-img-top" src="{{ asset('/storage/'.$player->photo) }}" height="325" alt="{{ $player->name }}">
                @else
                <img class="card-img-top" src="{{ asset('/storage/jogadores/avatar.jpg') }}" height="325" alt="{{ $player->name }}">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <span class="fs-2 text-dark fw-bold">{{ $player->shirt }}</span>
                        <h5 class="card-title ms-1">{{ $player->name }}</h5>
                    </div>
                    <p class="card-text text-start">{{ $player->position }}</p>
                    <div class="card-footer">
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-secondary btn-md">Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <h3 class="mt-5">ZAGUEIROS</h3>
    <div class="row row-cols-md-3 ms-5 mt-3">
        @foreach ($players as $player)
        @if ($player->position == 'Zagueiro')
        <div class="col mt-3">
            <div class="card text-center" style="width: 18rem;">
                @if ($player->photo)
                <img class="card-img-top" src="{{ asset('/storage/'.$player->photo) }}" height="325" alt="{{ $player->name }}">
                @else
                <img class="card-img-top" src="{{ asset('/storage/jogadores/avatar.jpg') }}" height="325" alt="{{ $player->name }}">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <span class="fs-2 text-dark fw-bold">{{ $player->shirt }}</span>
                        <h5 class="card-title ms-1">{{ $player->name }}</h5>
                    </div>
                    <p class="card-text text-start">{{ $player->position }}</p>
                    <div class="card-footer">
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-secondary btn-md">Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <h3 class="mt-5">LATERAIS</h3>
    <div class="row row-cols-md-3 ms-5 mt-3">
        @foreach ($players as $player)
        @if ($player->position == 'Lateral')
        <div class="col mt-3">
            <div class="card text-center" style="width: 18rem;">
                @if ($player->photo)
                <img class="card-img-top" src="{{ asset('/storage/'.$player->photo) }}" height="325" alt="{{ $player->name }}">
                @else
                <img class="card-img-top" src="{{ asset('/storage/jogadores/avatar.jpg') }}" height="325" alt="{{ $player->name }}">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <span class="fs-2 text-dark fw-bold">{{ $player->shirt }}</span>
                        <h5 class="card-title ms-1">{{ $player->name }}</h5>
                    </div>
                    <p class="card-text text-start">{{ $player->position }}</p>
                    <div class="card-footer">
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-secondary btn-md">Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <h3 class="mt-5">MEIO-CAMPISTAS</h3>
    <div class="row row-cols-md-3 ms-5 mt-3">
        @foreach ($players as $player)
        @if ($player->position == 'Meio Campo')
        <div class="col mt-3">
            <div class="card text-center" style="width: 18rem;">
                @if ($player->photo)
                <img class="card-img-top" src="{{ asset('/storage/'.$player->photo) }}" height="325" alt="{{ $player->name }}">
                @else
                <img class="card-img-top" src="{{ asset('/storage/jogadores/avatar.jpg') }}" height="325" alt="{{ $player->name }}">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <span class="fs-2 text-dark fw-bold">{{ $player->shirt }}</span>
                        <h5 class="card-title ms-1">{{ $player->name }}</h5>
                    </div>
                    <p class="card-text text-start">{{ $player->position }}</p>
                    <div class="card-footer">
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-secondary btn-md">Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <h3 class="mt-5">ATACANTES</h3>
    <div class="row row-cols-md-3 ms-5 mt-3">
        @foreach ($players as $player)
        @if ($player->position == 'Atacante')
        <div class="col mt-3">
            <div class="card text-center" style="width: 18rem;">
                @if ($player->photo)
                <img class="card-img-top" src="{{ asset('/storage/'.$player->photo) }}" height="325" alt="{{ $player->name }}">
                @else
                <img class="card-img-top" src="{{ asset('/storage/jogadores/avatar.jpg') }}" height="325" alt="{{ $player->name }}">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <span class="fs-2 text-dark fw-bold">{{ $player->shirt }}</span>
                        <h5 class="card-title ms-1">{{ $player->name }}</h5>
                    </div>
                    <p class="card-text text-start">{{ $player->position }}</p>
                    <div class="card-footer">
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-secondary btn-md">Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection