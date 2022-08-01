@extends('template.index')
@section('title', 'Login')
@section('content')


<div class="row mt-3 justify-content-center">
    <div class="col-5">
        <h3>Log-in</h3>
        <form action="{{ route('login') }}" class="rounded shadow p-3 bg-dark" method="POST">
            @csrf
            <input type="email" placeholder="E-mail" class="form-control mb-3" name="email" required>
            <input type="password" placeholder="Senha" class="form-control mb-3" name="password" required>
            <button type='submit' class="btn btn-outline-light d-block w-100"> {{ __('Entre') }}</button>
            <div class="d-flex justify-content-between pt-2">
                @if (Route::has('password.request'))
                <a class="nav-link text-white p-0" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
                @endif
                <a href="/register" class='nav-link text-white p-0'>Cadastre-se!</a>
            </div>
        </form>
    </div>
</div>

@endsection