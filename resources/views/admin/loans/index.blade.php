@extends('layouts.app')

@section('page-title')
    Empréstimos
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Emprestimos <small>Painel de emprestimos</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Painel
                </li>
                <li class="active">
                    <i class="fa fa-calendar"></i> Emprestimos
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>Emprestimos</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Livro</th>
                        <th>Leitor</th>
                        <th>Data de retirada</th>
                        <th>Data de retorno</th>
                        <th>Retornado em</th>
                        <th>Cancelado em</th>
                        <th>Responsável</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loans as $loan)
                        <tr width="1%" nowrap>
                            <td>{{ $loan->book->title }}</td>
                            <td>{{ $loan->reader->name }}</td>
                            <td>{{ $loan->withdrawal_at }}</td>
                            <td>{{ $loan->return_date }}</td>
                            <td>{{ $loan->returned_at ?? 'não devolvido'}}</td>
                            <td>{{ $loan->canceled_at ?? 'não cancelado'}}</td>
                            <td>{{ $loan->user->name }}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-default">editar</a>
                                <a href="#" class="btn btn-xs btn-default">excluir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection