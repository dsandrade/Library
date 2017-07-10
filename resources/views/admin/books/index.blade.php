@extends('layouts.app')

@section('page-title')
    Livros
@endsection

@section('content')

    @include('admin.books.partials.description')

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

    <a href="{{ route('livros.create') }}" class="btn btn-success">Criar</a>

    <div class="row">
        <div class="col-lg-12">
            <h2>Lista de Livros</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
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
                            <td>{{ $book->publisher->name }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>
                                <a href="{{ route('livros.edit', $book->id) }}" class="btn btn-primary">Editar</a>
                                {{ Form::model($book, ['route' => ['livros.destroy', $book->id]]) }}
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