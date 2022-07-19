@extends('template.index')
@section('title', "{$player->name}")

@section('content')


<div class="row mt-5 justify-content-center">
    <div class="col-3">
        <img src="{{ asset('/storage/jogadores/'.$player->photo) }}" width="300" height="325" alt="">
    </div>
    <div class="col-5">
        <li class="list-group-item">
            <span class="fs-6 text-secondary fw-bold">NOME COMPLETO</span>
            <p class="fs-4">{{ $player->name }}</p>
        </li>
        <div class="d-flex gap-5">
            <li class="list-group-item">
                <span class="fs-6 text-secondary fw-bold">POSIÇÃO</span>
                <p class="fs-5">{{ $player->position }}</p>
            </li>
            <li class="list-group-item text-center">
                <span class="fs-6 text-secondary fw-bold">NÚMERO DA CAMISA</span>
                <p class="fs-5">{{ $player->shirt }}</p>
            </li>
        </div>
        <div class="d-flex gap-5">
            <li class="list-group-item">
                <span class="fs-6 text-secondary fw-bold"> DATA DE NASCIMENTO</span>
                <p class="fs-5">{{ $player->birth_date }}</p>
            </li>
            <li class="list-group-item">
                <span class="fs-6 text-secondary fw-bold">NATURAL DE :</span>
                <p class="fs-5">{{ $player->city }} - {{ $player->state }} - {{ $player->country }}</p>
            </li>
        </div>
    </div>
</div>


@endsection