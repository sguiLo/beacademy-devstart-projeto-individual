@extends('template.index')
@section('title', 'Login')
@section('content')

<h1 class="mt-5">Listagem de Usuários</h1>
<hr>


<div class="container">
    <div class="row">
        <div class="col-sm mt-2 mb-5">
            <a href="{{ route('users.create') }}" class="btn btn-outline-dark">Novo Usuário</a>
        </div>
        <div class="col-sm mt-2 mb-5">
            <form action="{{ route('users.index') }}" method="GET">
                <div class="input-group">
                    <input type="seach" class="form-control rounded" name="search">
                    <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table table-striped table-secondary border">
    <thead class="text-center">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Data Cadastro</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-dark text-white">Visualizar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection