<div class="well well-sm">
<div class="form-group">
    {!! Form::label('body', 'Content:') !!}
    {!! Form::textarea('body',null, array('class'=>'form-control','size'=>'20x3') ) !!}
</div>
<!--<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>-->
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
</div>
</div>