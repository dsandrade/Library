@extends('layouts.admin')

@section('page-title')
    Autores
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
        @foreach($authors as $author)
            <tr width="1%" nowrap>
                <td>{{ $author->name }}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">editar</a>
                    <a href="#" class="btn btn-xs btn-default">excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection