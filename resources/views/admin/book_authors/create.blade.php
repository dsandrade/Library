@extends('layouts.app')

@section('page-title')
    Criar Autor para Livro
@endsection

@section('content')

    @include('admin.book_authors.partials.description')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Criar Autor para Livro</h1><br>

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
        </div>
    </div>
@endsection