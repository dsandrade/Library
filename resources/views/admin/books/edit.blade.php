@extends('layouts.app')

@section('page-title')
    Editar Livro
@endsection

@section('content')

    @include("admin.books.partials.description")

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Editar Livro</h1><br>

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
            {!! Form::model($book->first(), ['route' => ['livros.update', $book->first()->id]]) !!}
            <input type="hidden" name="_method" value="PUT">
            @include('admin.books.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection