<div class="form-group">
    {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
    {!!  Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('login', 'Login', ['class' => 'control-label']) !!}
    {!!  Form::text('login', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Senha', ['class' => 'control-label']) !!}
    {!!  Form::password('password', ['class' => 'form-control']) !!}
</div>

<button type="submit" class="btn btn-primary">Salvar</button>