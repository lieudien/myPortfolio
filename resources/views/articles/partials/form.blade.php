<div class='form-group'>
    {!! Form::label('name','Name:') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label('body','Body:') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at','Published on:') !!}
    {!! Form::input('date','published_at',date('d-m-Y'),['class'=>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>