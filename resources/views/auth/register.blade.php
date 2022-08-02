@extends('template.index')
@section('title', 'Login')
@section('content')
<div class="justify-content-center row mt-3">
    <div class="col-5">
        <h3>Cadastre-se</h3>
        <form method="POST" action="{{ route('register') }}" class="rounded shadow p-3 bg-dark">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input type="text" placeholder="Nome Completo" id="name" class="form-control" name="name" />
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" placeholder="E-mail" id="email" class="form-control" name="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" placeholder="Senha" id="password" class="form-control" name="password" />
            </div>
            <!-- Confirm Password input -->
            <div class="form-outline mb-4">
                <input type="password" placeholder="Confirme sua senha" id="password_confirmation" class="form-control" name="password_confirmation" required />
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light d-block w-100">Registrar</button>
        </form>
        <x-auth-validation-errors class="container alert alert-danger mt-2" :errors="$errors" />
    </div>
</div>

@endsection