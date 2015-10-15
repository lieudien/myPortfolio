@extends('app')

@section('content')
@if (count($people))
	<h1>CONTACT ME</h1>
	<ul>
		@foreach ($people as $person) 
			<li>{{ $person }}</li>
		@endforeach
	</ul>
@endif
@stop


@section('footer')
	<h2>FOOTER</h2>
@stop