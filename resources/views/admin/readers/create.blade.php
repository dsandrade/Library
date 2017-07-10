@extends('layouts.app')

@section('page-title')
    Criar Leitor
@endsection

@section('content')

    @include('admin.readers.partials.description')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Criar Leitor</h1><br>

            @if(count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'leitores.store']) !!}
            <input type="hidden" name="_method" value="POST">
            @include('admin.readers.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection