@extends('layouts.admin')

@section('page-title')
    Editar Livro
@endsection

@section('content')

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

    {!! Form::model($book, ['route' => ['livros.update', $book->id]]) !!}
    <input type="hidden" name="_method" value="PUT">
    @include('admin.books.partials.form')
    {!! Form::close() !!}
@endsection