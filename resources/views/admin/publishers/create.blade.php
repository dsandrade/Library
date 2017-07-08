@extends('layouts.app')

@section('page-title')
    Criar Editora
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

    {!! Form::open(['route' => 'editoras.store']) !!}
    <input type="hidden" name="_method" value="POST">
    @include('admin.publishers.partials.form')
    {!! Form::close() !!}
@endsection