@extends('layouts.admin')

@section('page-title')
    Empréstimos
@endsection

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Livro</th>
            <th>Leitor</th>
            <th>Data de retirada</th>
            <th>Data de retorno</th>
            <th>Retornado em</th>
            <th>Cancelado em</th>
            <th>Responsável</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loans as $loan)
            <tr width="1%" nowrap>
                <td>{{ $loan->books->title }}</td>
                <td>{{ $loan->readers->name }}</td>
                <td>{{ $loan->withdrawal_at }}</td>
                <td>{{ $loan->return_date }}</td>
                <td>{{ $loan->returned_at }}</td>
                <td>{{ $loan->canceled_at }}</td>
                <td>{{ $loan->users->name }}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">editar</a>
                    <a href="#" class="btn btn-xs btn-default">excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection