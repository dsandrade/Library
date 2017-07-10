@extends('layouts.app')

@section('page-title')
    Empréstimos
@endsection

@section('content')

    @include('admin.loans.partials.description')

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

    <a href="{{ route('emprestimos.create') }}" class="btn btn-success">Emprestar</a>
    <a href="{{ route('emprestimos.edit', '1') }}" class="btn btn-primary">Devolver</a>
    <a href="{{ route('emprestimos.edit', '2') }}" class="btn btn-danger">Cancelar</a><br><br>

    <div class="row">
        <div class="col-lg-4">
            {!! Form::open(['route' => 'emprestimos.option', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('option', 'Escolha uma opção de listagem', ['class' => 'control-label']) !!}
                {!!  Form::select('option', ['Empréstimos', 'Devoluções', 'Cancelamentos'], null, ['class' => 'form-control']) !!}
                <br>
                <button type="submit" class="btn btn-default">Escolher</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @if(isset($option))
        @if($option == 0 )
            <div class="row">
                <div class="col-lg-12">
                    <h2>Emprestimos</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Livro</th>
                                <th>Leitor</th>
                                <th>Data de retirada</th>
                                <th>Data de devolução</th>
                                <th>Devolvido em</th>
                                <th>Cancelado em</th>
                                <th>Responsável</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $loan)
                                <tr width="1%" nowrap>
                                    <td>{{ $loan->id }}</td>
                                    <td>{{ $loan->book->title }}</td>
                                    <td>{{ $loan->reader->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($loan->withdrawal_at)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($loan->return_date)) }}</td>
                                    <td>
                                        @if(isset($loan->returned_at))
                                            {{ date('d/m/Y', strtotime($loan->returned_at)) }}
                                        @else
                                            não devolvido
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($loan->canceled_at))
                                            {{ date('d/m/Y', strtotime($loan->canceled_at)) }}
                                        @else
                                            não cancelado
                                        @endif
                                    </td>
                                    <td>{{ $loan->user->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @elseif($option == 1)
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Devoluções</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Livro</th>
                                    <th>Leitor</th>
                                    <th>Data de retirada</th>
                                    <th>Data de devolução</th>
                                    <th>Devolvido em</th>
                                    <th>Responsável</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loans as $loan)
                                    @if(isset($loan->returned_at))
                                        <tr width="1%" nowrap>
                                            <td>{{ $loan->book->title }}</td>
                                            <td>{{ $loan->reader->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($loan->withdrawal_at)) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($loan->return_date)) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($loan->returned_at)) }}</td>
                                            <td>{{ $loan->user->name }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cancelamentos</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Livro</th>
                                <th>Leitor</th>
                                <th>Data de retirada</th>
                                <th>Cancelado em</th>
                                <th>Responsável</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $loan)
                                @if(isset($loan->canceled_at))
                                    <tr width="1%" nowrap>
                                        <td>{{ $loan->book->title }}</td>
                                        <td>{{ $loan->reader->name }}</td>
                                        <td>{{ date('d/m/Y', strtotime($loan->withdrawal_at)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($loan->canceled_at)) }}</td>
                                        <td>{{ $loan->user->name }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection