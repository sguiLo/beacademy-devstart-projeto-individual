@extends('template.index')
@section('title', "Usuário {$user->name}")
@section('content')


@if (session()->has('update'))
<div class="d-flex justify-content-center">
    <div class="alert alert-dark alert-dismissible fade show w-50 mt-2" role="alert">
        <strong>Atenção!</strong> {{ session()->get('update') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<h1 class="mt-5">{{ $user->name }}</h1>
<hr>
<table class="table table-striped table-secondary ">
    <thead class="text-center">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Data Cadastro</th>
            <th scope="col">AÇÕES</th>
        </tr>
    </thead>
    <tbody class="text-center ">
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
            <td class="d-flex justify-content-center"><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-white me-1">Editar</a>
                @if (Auth::user()->is_admin ==1)
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger text-white ms-1">Deletar</button>
                </form>
            </td>
            @endif
        </tr>
    </tbody>
</table>
@endsection