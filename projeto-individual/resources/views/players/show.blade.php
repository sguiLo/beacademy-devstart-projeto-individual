@extends('template.index')
@section('title', "{$player->name}")

@section('content')


<div class="row mt-5 justify-content-center">
    <div class="col-4">
        @if ($player->photo)
        <img src="{{ asset('/storage/'.$player->photo) }}" width="300" height="325" alt="Foto do {{ $player->name}}" class="rounded">
        @else
        <img src="{{ asset('/storage/jogadores/avatar.jpg') }}" width="300" height="325" alt="Foto do {{ $player->name}}" class="rounded">
        @endif
    </div>
    <div class="col-3">
        <li class="list-group-item">
            <span class="fs-6 text-secondary fw-bold">NOME COMPLETO</span>
            <p class="fs-5 fw-semibold">{{ $player->name }}</p>
        </li>
        <li class="list-group-item">
            <span class="fs-6 text-secondary fw-bold"> DATA DE NASCIMENTO</span>
            <p class="fs-5 fw-semibold">{{ $player->birth_date }}</p>
        </li>
        <li class="list-group-item ">
            <span class="fs-6 text-secondary fw-bold">NATURAL DE</span>
            <p class="fs-5 fw-semibold">{{ $player->city }} - {{ $player->state }} - {{ $player->country }}</p>
        </li>
        @if (Auth::user() && Auth::user()->is_admin == 1)
        <li class="list-group-item">
            <td>
                <span class="fs-6 text-secondary fw-bold">PARA EDITAR O JOGADOR</span>
                <p>
                    <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning text-whiter">
                        CLIQUE AQUI</a>
                </p>
            </td>
        </li>
        @endif
    </div>
    <div class="col-3">
        <li class="list-group-item">
            <span class="fs-6 text-secondary fw-bold">POSIÇÃO</span>
            <p class="fs-5 fw-semibold">{{ $player->position }}</p>
        </li>
        <li class="list-group-item">
            <span class="fs-6 text-secondary fw-bold">NÚMERO DA CAMISA</span>
            <p class="fs-5 fw-semibold">{{ $player->shirt }}</p>
        </li>
        @if (Auth::user() && Auth::user()->is_admin == 1)
        <li class="list-group-item">
            <span class="fs-6 text-secondary fw-bold">SALÁRIO</span>
            <p class="fs-5 fw-semibold">R${{ number_format($player->salary) }} mensais</p>
        </li>
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
    @endsection