@extends('layouts.app')

@section('page-title')
    Criar Livro
@endsection

@section('content')

    @include("admin.books.partials.description")

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Criar Livro</h1><br>

    @if(count($errors->all()) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'livros.store']) !!}
    <input type="hidden" name="_method" value="POST">
    @include('admin.books.partials.form')
    {!! Form::close() !!}
        </div>
    </div>
@endsection