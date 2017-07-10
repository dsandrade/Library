@extends('layouts.app')

@section('page-title')
    Relatórios
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

    <div class="row">
        <div class="col-lg-4">
            {!! Form::open(['route' => 'relatorios.option', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('option', 'Escolha uma opção de listagem', ['class' => 'control-label']) !!}
                {!!  Form::select('option', ['Livros mais retirados', 'Leitores que mais retiraram'], null, ['class' => 'form-control']) !!}
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
                    <h2>Livros mais retirados</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Livro</th>
                                <th>Quantidade de retiradas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr width="1%" nowrap>
                                    <td>{{ $report->book->title }}</td>
                                    <td>{{ $report->quant_loans }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <h2>Maiores Leitores</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Leitor</th>
                                <th>Quantidade de retiradas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr width="1%" nowrap>
                                    <td>{{ $report->reader->name }}</td>
                                    <td>{{ $report->quant_loans }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection