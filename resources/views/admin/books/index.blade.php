@extends('layouts.admin')

@section('page-title')
    Livros
@endsection

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Editora</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>ISBN</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr width="1%" nowrap>
                <td>{{ $book->publishers->name }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->isbn }}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">editar</a>
                    <a href="#" class="btn btn-xs btn-default">excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection