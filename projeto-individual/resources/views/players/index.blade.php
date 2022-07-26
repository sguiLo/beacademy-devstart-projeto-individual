@extends('template.index')
@section('title', 'ELENCO')

@section('content')


<div class="container">
    <h1 class="mt-5">ELENCO</h1>
    <hr>
    <div class="row">
        @if (Auth::user() && Auth::user()->is_admin == 1)
        <div class="col-sm mt-2 mb-1">
            <a href="{{ route('players.create') }}" class="btn btn-outline-dark">Novo Jogador</a>
        </div>
        @endif
        <div class="col-sm mt-2 mb-5">
            <form action="#" method="GET">
                <div class="input-group">
                    <input type="seach" class="form-control rounded" name="search">
                    <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row row-cols-md-3 ms-5">
        @foreach ($players as $player)
        <div class="col mt-3">
            <div class="card text-center" style="width: 18rem;">
                @if ($player->photo)
                <img class="card-img-top" src="{{ asset('/storage/'.$player->photo) }}" height="325" alt="{{ $player->name }}">
                @else
                <img class="card-img-top" src="{{ asset('/storage/jogadores/avatar.jpg') }}" height="325" alt="{{ $player->name }}">
                @endif
                <div class="card-body">
                    <div class="d-flex align-items-end">
                        <span class="fs-2 text-warning fw-bold">{{ $player->shirt }}</span>
                        <h5 class="card-title ms-1">{{ $player->name }}</h5>
                    </div>
                    <p class="card-text text-start">{{ $player->position }}</p>
                    <div class="card-footer">
                        <a href="{{ route('players.show', $player->id) }}" class="btn btn-secondary btn-md">Detalhes</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection