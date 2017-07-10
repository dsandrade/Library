@extends('layouts.app')

@section('page-title')
    Criar Empréstimo
@endsection

@section('content')

    @include('admin.publishers.partials.description')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center">Criar Empréstimo</h1><br>


            @if(count($errors->all()) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'emprestimos.store']) !!}
            <input type="hidden" name="_method" value="POST">

            <div class="form-group">
                {!! Form::label('book_id', 'Livro', ['class' => 'control-label']) !!}
                {!!  Form::select('book_id', $booksForSelect, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('reader_id', 'Leitor', ['class' => 'control-label']) !!}
                {!!  Form::select('reader_id', $readersForSelect, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('withdrawal_at', 'Data de retirada', ['class' => 'control-label']) !!}
                {!!  Form::date('withdrawal_at', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('return_date', 'Data de retorno', ['class' => 'control-label']) !!}
                {!!  Form::date('return_date', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('user_id', 'Responsável', ['class' => 'control-label']) !!}
                {!!  Form::select('user_id', $usersForSelect, null, ['class' => 'form-control']) !!}
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection