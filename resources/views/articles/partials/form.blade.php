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

<div class="form-group">
    {!! Form::label('tag_list','Tags:') !!}
    {!! Form::select('tag_list[]',$tags, null ,['id' =>'tag_list','class'=>'form-control', 'multiple']) !!}
</div>

<div class='form-group'>
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            'placeholder' : 'Choose a tag'
        });
    </script>
@stop
