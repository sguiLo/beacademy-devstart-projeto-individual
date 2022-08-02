@extends('template.index')
@section('title', 'Home')
@section('content')

<h2 class="text-center mt-5">NÓS SOMOS A MASSA!</h2>


<div class="row justify-content-between mt-5 mb-5">
    <div class="col-5">
        <h3>Registre-se, seja <span class="text-warning">SÓCIO</span> e ajude o Galo a crescer cada vez mais <a href="{{ route('register') }}" class="link-dark">aqui.</a></h3>
        </h3>
    </div>
    <div class="col-5">
        <h3>Vantagens do sócio-torcedor:</h3>
        <ul>
            <li>Tenha acesso à lista e biografia de jogadores do clube.</li>
            <li>Tenha desconto na compra de cadeiras cativas.</li>
            <li>Ganhe uma camisa oficial por temporada.</li>
        </ul>
    </div>
</div>
<hr>
<div class="row align-items-center mt-5 gap-5">
    <div class="col-sm">
        <h3>Conheça a nova casa do <span class="text-warning">GALO</span>, a arena MRV! Inauguração em 2023, mais informações <a href="https://www.arenamrv.com.br/" target="_blank" class="link-dark">aqui.</a></h3>
    </div>
    <div class="col-sm">
        <img src="/storage/arena.png" alt="" width="650" height="500">
    </div>
</div>

@endsection