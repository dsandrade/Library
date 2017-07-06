@extends('layouts.admin')

@section('page-title')
    Editora
@endsection

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($publishers as $publisher)
            <tr width="1%" nowrap>
                <td>{{ $publisher->name }}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">editar</a>
                    <a href="#" class="btn btn-xs btn-default">excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection