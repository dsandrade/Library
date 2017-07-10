@extends('layouts.app')

@section('page-title')
    Criar Autor
@endsection

@section('content')

    @include('admin.authors.partials.description')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Criar Autor</h1><br>

            @if(count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'autores.store']) !!}
            <input type="hidden" name="_method" value="POST">
            @include('admin.authors.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection