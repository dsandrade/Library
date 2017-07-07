@extends('layouts.admin');

@section('page-title')
    Criar Usuário
@endsection

@section('content')

    {!! Form::open(['route' => ['clientes.store', ]]) !!}
    <input type="hidden" name="_method" value="POST">
        @include('admin.users.partials.form')
    {!! Form::close() !!}
@endsection