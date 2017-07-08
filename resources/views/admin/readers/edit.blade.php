@extends('layouts.app')

@section('page-title')
    Editar Leitor
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

    {!! Form::model($reader, ['route' => ['autores.update', $reader->id]]) !!}
    <input type="hidden" name="_method" value="PUT">
    @include('admin.readers.partials.form')
    {!! Form::close() !!}
@endsection