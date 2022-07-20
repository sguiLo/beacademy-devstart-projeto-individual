@extends('template.index')
@section('title', 'ELENCO')

@section('content')
<div class="justify-content-center row mt-3">
    <div class="col-5">
        <h3>Adicionar novo jogador</h3>
        <form method="POST" action="{{ route('players.store') }}" class="rounded shadow p-3 bg-dark" enctype="multipart/form-data">
            @csrf
            <div class="form-outline mb-4">
                <input type="text" placeholder="Nome Completo" id="name" class="form-control" name="name" />
            </div>
            <div class="row">
                <div class="form-outline mb-2 col-sm">
                    <input type="date" id="birth_date" name="birth_date" placeholder='Data de nascimento' class='form-control mb-3' required>
                </div>
                <div class="form-outline mb-2 col-sm">
                    <input type="text" id="country" name="country" placeholder='País' class='form-control mb-3'>
                </div>
            </div>
            <div class="row">
                <div class="form-outline mb-2 col-sm">
                    <input type="text" id="city" name="city" placeholder='Cidade' class='form-control mb-3' required>
                </div>
                <div class="form-outline mb-2 col-sm">
                    <input type="text" id="state" name="state" placeholder='Estado' class='form-control mb-3'>
                </div>
            </div>
            <div class="row">
                <div class="form-outline mb-2 col-sm">
                    <select class="form-select" aria-label="Default select example" id="position" name="position">
                        <option selected>Posição</option>
                        <option value="Goleiro">Goleiro</option>
                        <option value="Defensor">Defensor</option>
                        <option value="Meio Campo">Meio Campo</option>
                        <option value="Atacante">Atacante</option>
                    </select>
                </div>
                <div class="form-outline mb-4 col-sm">
                    <select class="form-select" aria-label="Default select example" id="shirt" name="shirt">
                        <option selected>Nº Camisa</option>
                        @for ($a=0; $a < 99; $a++) <option value="{{$a}}">{{$a}}</option>
                            @endfor
                    </select>
                </div>
            </div>
            <div class="form-outline mb-2">
                <input type="text" placeholder="Salário mensal, somente números" id="salary" class="form-control" name="salary" />
            </div>
            <div class="form-outline mb-4">
                <label for="photo" class="text-white">Adicionar foto</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-outline-light d-block w-100">Adicionar</button>
        </form>
    </div>
</div>
@endsection