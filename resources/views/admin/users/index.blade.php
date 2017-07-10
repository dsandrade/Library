@extends('layouts.app')

@section('page-title')
    Usuário
@endsection

@section('content')

    @include('admin.users.partials.description')

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

    <a href="{{ route('clientes.create') }}" class="btn btn-success">Criar</a>

    <div class="row">
        <div class="col-lg-12">
            <h2>Lista de usuários</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr width="1%" nowrap>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->login }}</td>
                            <td>
                                <a href="{{ route('clientes.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                                {{ Form::model($user, ['route' => ['clientes.destroy', $user->id]]) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Excluir', ['class' => 'btn btn-danger']) }}
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