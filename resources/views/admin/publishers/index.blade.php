@extends('layouts.admin')

@section('page-title')
    Editora
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

    <a href="{{ route('editoras.create') }}" class="btn btn-xs btn-default">criar</a>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($publishers as $publisher)
            <tr width="1%" nowrap>
                <td>{{ $publisher->name }}</td>
                <td>
                    <a href="{{ route('editoras.edit', $publisher->id) }}" class="btn btn-xs btn-default">editar</a>
                    {{ Form::model($publisher, ['route' => ['editoras.destroy', $publisher->id]]) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('excluir', ['class' => 'btn btn-xs btn-default']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection