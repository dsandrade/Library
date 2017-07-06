@extends('layouts.admin')

@section('page-title')
    Livros | Autores
@endsection

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Livro</th>
            <th>Autor</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($book_authors as $book_author)
            <tr width="1%" nowrap>
                <td>{{ $book_author->books->title }}</td>
                <td>{{ $book_author->authors->name }}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">editar</a>
                    <a href="#" class="btn btn-xs btn-default">excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection