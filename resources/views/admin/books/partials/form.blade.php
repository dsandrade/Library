<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            {!! Form::label('publisher_id', 'Editora', ['class' => 'control-label']) !!}
            {!!  Form::select('publisher_id', $publishersForSelect, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Título', ['class' => 'control-label']) !!}
            {!!  Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição', ['class' => 'control-label']) !!}
            {!!  Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('isbn', 'ISBN', ['class' => 'control-label']) !!}
            {!!  Form::text('isbn', null, ['class' => 'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>