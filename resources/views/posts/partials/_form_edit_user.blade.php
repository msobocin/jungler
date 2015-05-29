<!--<div class="form-group">
    {!! Form::label('content', 'Contraseña:') !!}
    {!! Form::password('password',null,array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Confirmar contraseña:') !!}
    {!! Form::password('password_confirmation',null,array('class' => 'form-control')) !!}
</div>-->
<div class="form-group">
    {!! Form::label('sexo', 'Sexo:') !!}
    <br/>
    <div class="checkbox">
        {!! Form::label('sexo', 'Masculino:') !!}
        {!!Form::radio('sexo', 'masculino', true)!!}
        <br />
        {!! Form::label('sexo', 'Femenino:') !!}
        {!!Form::radio('sexo', 'femenino', true)!!}
    </div>
</div>
<div class="form-group">

    {!! Form::select('country', array('argentina' => 'Argentina', 'espana' => 'Espa&ntilde;a','portugal'=>'Portugal','polonia'=>'Polonia','brasil'=>'Brasil'),array('class' => 'form-control'))!!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>