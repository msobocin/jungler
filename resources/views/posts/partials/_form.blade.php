
<div class="form-group">
    <!--{!! Form::label('content', 'Post:') !!}-->
    {!! Form::textarea('content',null, array('class'=>'form-control','size'=>'20x3', 'placeholder'=>'A que vine al mundo...?') ) !!}
</div>
<!--<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>-->
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
</div>
