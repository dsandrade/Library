<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            {!! Form::label('name', 'Nome', array('class' => 'control-label')) !!}
            {!!  Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('login', 'Login', array('class' => 'control-label')) !!}
            {!!  Form::text('login', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Senha', array('class' => 'control-label')) !!}
            {!!  Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>