<div class="well well-sm">
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content',null, array('class'=>'form-control','size'=>'20x3') ) !!}
</div>
<!--<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>-->
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
</div>
</div>