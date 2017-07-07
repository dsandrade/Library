<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            {!! Form::label('book_id', 'Livro', ['class' => 'control-label']) !!}
            {!!  Form::select('book_id', $booksForSelect, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('author_id', 'Autor', ['class' => 'control-label']) !!}
            {!!  Form::select('author_id', $authorsForSelect, null, ['class' => 'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>