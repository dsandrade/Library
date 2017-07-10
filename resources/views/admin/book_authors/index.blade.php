@extends('layouts.app')

@section('page-title')
    Livros | Autores
@endsection

@section('content')

    @include('admin.book_authors.partials.description')

    @if(count($errors->all()) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <a href="{{ route('livrosautores.create') }}" class="btn btn-success">Criar</a>

    <div class="row">
        <div class="col-lg-12">
            <h2>Lista de Livros/Autores</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
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
                            <td>{{ $book_author->book->title }}</td>
                            <td>{{ $book_author->author->name }}</td>
                            <td>
                                <a href="{{ route('livrosautores.edit', $book_author->id) }}" class="btn btn-primary">Editar</a>
                                {{ Form::model($book_author, ['route' => ['livrosautores.destroy', $book_author->id]]) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Excluir', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection