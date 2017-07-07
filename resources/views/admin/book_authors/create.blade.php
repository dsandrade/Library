@extends('layouts.admin')

@section('page-title')
    Criar Autor para Livro
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

    {!! Form::open(['route' => 'livrosautores.store']) !!}
    <input type="hidden" name="_method" value="POST">
    @include('admin.book_authors.partials.form')
    {!! Form::close() !!}
@endsection