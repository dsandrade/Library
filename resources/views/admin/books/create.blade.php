@extends('layouts.admin')

@section('page-title')
    Criar Livro
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

    {!! Form::open(['route' => 'livros.store']) !!}
    <input type="hidden" name="_method" value="POST">
    @include('admin.books.partials.form')
    {!! Form::close() !!}
@endsection