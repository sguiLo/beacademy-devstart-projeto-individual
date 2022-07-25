@extends('template.index')
@section('title', 'Login')
@section('content')
<div class="justify-content-center row mt-5">
    <div class="col-5">
        <h3>Usuário - {{ $user->name }}</h3>
        <form method="post" action="{{ route('users.update', $user->id) }}" class="rounded shadow p-3 bg-dark">
            @method('PUT')
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input type="text" placeholder="Nome Completo" id="name" class="form-control" name="name" value="{{ $user->name }}" />
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" placeholder="E-mail" id="email" class="form-control" name="email" value="{{ $user->email }}" />
            </div>
            <div class="form-outline mb-3">
                <input type="password" placeholder="Senha" id="password" class="form-control" name="password" />
            </div>
            <div class="form-outline mb-4">
                <input type="password" placeholder="Confirme sua senha" id="password_confirmation" class="form-control" name="password_confirmation" />
            </div>
            @if (Auth::user()->is_admin == 1)
            <input class="form-check-input" type="checkbox" name="admin" value="1">
            <label class="form-check-label inline-block text-white mb-4" for="flexCheckDefault">
                Adminstrador
            </label>
            @endif
            <button type="submit" class="btn btn-outline-light d-block w-100">Atualizar</button>
        </form>
    </div>
</div>

@endsection