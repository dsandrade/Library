@extends('layouts.admin')

@section('page-title')
    Leitor
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

    <a href="{{ route('leitores.create') }}" class="btn btn-xs btn-default">criar</a>

    <table class="table table-bordered table-striped">
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
@endsection