@extends('template.index')
@section('title', "{$player->name}")

@section('content')
@if (session()->has('update'))
<div class="alert alert-dark alert-dismissible fade show w-75" role="alert">
    <strong>Atenção!</strong> {{ session()->get('update') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h3 class="text-center mt-3">Detalhes do jogador - {{ $player->name }}</h3>
<div class="d-flex mt-5 justify-content-center">
    <div>
        @if ($player->photo)
        <img src="{{ asset('/storage/'.$player->photo) }}" width="300" height="325" alt="Foto do {{ $player->name}}" class="rounded">
        @else
        <img src="{{ asset('/storage/jogadores/avatar.jpg') }}" width="300" height="325" alt="Foto do {{ $player->name}}" class="rounded">
        @endif
    </div>
</div>

<div class="mt-5 d-flex justify-content-center gap-5">
    <div>
        <span class="fs-6 text-secondary fw-bold">NOME:</span>
        <p class="fs-5 fw-semibold">{{ $player->name }}</p>

        <span class="fs-6 text-secondary fw-bold"> DATA DE NASCIMENTO</span>
        <p class="fs-5 fw-semibold">{{ $player->birth_date }}</p>

        <span class="fs-6 text-secondary fw-bold">NATURAL DE</span>
        <p class="fs-5 fw-semibold">{{ $player->city }} - {{ $player->state }} - {{ $player->country }}</p>

        @if (Auth::user() && Auth::user()->is_admin == 1)
        <td>
            <span class="fs-6 text-secondary fw-bold">PARA EDITAR O JOGADOR</span>
            <p>
                <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning text-whiter">
                    CLIQUE AQUI</a>
            </p>
        </td>
        @endif
    </div>
    <div>
        <span class="fs-6 text-secondary fw-bold">POSIÇÃO</span>
        <p class="fs-5 fw-semibold">{{ $player->position }}</p>

        <span class="fs-6 text-secondary fw-bold">NÚMERO DA CAMISA</span>
        <p class="fs-5 fw-semibold">{{ $player->shirt }}</p>

        @if (Auth::user() && Auth::user()->is_admin == 1)
        <span class="fs-6 text-secondary fw-bold">SALÁRIO</span>
        <p class="fs-5 fw-semibold">R${{ number_format($player->salary) }} mensais</p>

        <td>
            <span class="fs-6 text-secondary fw-bold">PARA EXCLUIR O JOGADOR</span>
            <form action="{{ route('players.destroy', $player->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger text-white">CLIQUE AQUI</button>
            </form>
        </td>
        @endif
    </div>
</div>
@endsection