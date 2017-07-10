@extends('layouts.app')

@section('page-title')
    Criar Usuário
@endsection

@section('content')

    @include('admin.users.partials.description')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Criar Usuário</h1><br>

            @if(count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'clientes.store']) !!}
            <input type="hidden" name="_method" value="POST">
            @include('admin.users.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection