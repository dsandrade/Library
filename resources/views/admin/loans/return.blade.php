@extends('layouts.app')

@section('page-title')
    Devolver Empréstimo
@endsection

@section('content')

    @include('admin.publishers.partials.description')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Devolver Empréstimo</h1><br>


            @if(count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => ['emprestimos.update', 1]]) !!}
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                {!! Form::label('id', 'ID do empréstimo', ['class' => 'control-label']) !!}
                {!!  Form::text('id', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('returned_at', 'Data de devolução', ['class' => 'control-label']) !!}
                {!!  Form::date('returned_at', null, ['class' => 'form-control']) !!}
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection