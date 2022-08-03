@extends('template.index')
@section('title', 'ELENCO')

@section('content')
<div class="justify-content-center row mt-3">
    <div class="col-5">
        <h3>Editar Jogador</h3>
        <form method="POST" action="{{ route('players.update', $player->id) }}" class="rounded shadow p-3 bg-dark" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-outline mb-2">
                <label for="name" class="text-white">Nome completo</label>
                <input type="text" placeholder="Nome Completo" id="full_name" class="form-control" name="full_name" value="{{ $player->full_name }}" />
            </div>
            <div class="form-outline mb-2">
                <label for="name" class="text-white">Nome de jogador</label>
                <input type="text" placeholder="Nome Completo" id="name" class="form-control" name="name" value="{{ $player->name }}" />
            </div>
            <div class="row">
                <div class="form-outline mb-2 col-sm">
                    <label for="position" class="text-white">Posição</label>
                    <select class="form-select" aria-label="Default select example" id="position" name="position">
                        <option selected>{{ $player->position }}</option>
                        <option value="Goleiro">Goleiro</option>
                        <option value="Zagueiro">Zagueiro</option>
                        <option value="Lateral">Lateral</option>
                        <option value="Meio Campo">Meio Campo</option>
                        <option value="Atacante">Atacante</option>
                    </select>
                </div>
                <div class="form-outline mb-2 col-sm">
                    <label for="shirt" class="text-white">Nº Camisa</label>
                    <select class="form-select" aria-label="Default select example" id="shirt" name="shirt">
                        <option selected>{{ $player->shirt }}</option>
                        @for ($a=0; $a < 99; $a++) <option value="{{$a}}">{{$a}}</option>
                            @endfor
                    </select>
                </div>
            </div>
            <div class="form-outline mb-2">
                <label for="salary" class="text-white">Salário atual</label>
                <input type="text" placeholder="Salário mensal, somente números" id="salary" class="form-control" name="salary" value="{{ ($player->salary) }}" />
            </div>
            <div class="row">
                <div class="form-outline mb-4 col-sm-7">
                    <label for="photo" class="text-white">Foto do Jogador</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <div class="form-outline mb-2 col-sm">
                    @if ($player->photo)
                    <img src="{{ asset('/storage/'.$player->photo) }}" width="150" height="125" alt="" class="rounded">
                    @else
                    <img src="{{ asset('/storage/jogadores/avatar.jpg') }}" width="150" height="125" alt="">
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-outline-light d-block w-100">Atualizar</button>
        </form>
    </div>
</div>
@endsection