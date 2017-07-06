@extends('layouts.admin')

@section('page-title')
    Usuário
@endsection

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Login</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr width="1%" nowrap>
                <td>{{ $user->name }}</td>
                <td>{{ $user->login }}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">editar</a>
                    <a href="#" class="btn btn-xs btn-default">excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection