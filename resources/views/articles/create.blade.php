@extends('app')

@section('content')
    <h1>Write a new article</h1>

    <hr/>
    {!! Form::open(['url' => 'articles']) !!}

    <!-- Add name to the form -->
    <div class='form-group'>
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <!-- Add body to the form -->
    <div class='form-group'>
        {!! Form::label('body','Body:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>

    <!-- Add published_at to the form -->
    <div class="form-group">
        {!! Form::label('published_at','Published on:') !!}
        {!! Form::input('date','published_at',date('d-m-Y'),['class'=>'form-control']) !!}
    </div>

    <!-- Add Add new article to the form -->
    <div class='form-group'>
        {!! Form::submit('Add new article',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
    @if ($errors->any())
        <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
@stop
