@extends('layouts.app')

@section('page-title')
    Leitor
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Leitores <small>Painel de leitores</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Painel
                </li>
                <li class="active">
                    <i class="fa fa-user-md"></i> Leitores
                </li>
            </ol>
        </div>
    </div>

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

    <a href="{{ route('leitores.create') }}" class="btn btn-xs btn-default">criar</a>

    <div class="row">
        <div class="col-lg-12">
            <h2>Lista de leitores</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($readers as $reader)
                        <tr width="1%" nowrap>
                            <td>{{ $reader->name }}</td>
                            <td>
                                <a href="{{ route('leitores.edit', $reader->id) }}" class="btn btn-xs btn-default">editar</a>
                                {{ Form::model($reader, ['route' => ['leitores.destroy', $reader->id]]) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('excluir', ['class' => 'btn btn-xs btn-default']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection