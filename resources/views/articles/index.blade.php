@extends('app')


@section('content')
	<h1>Articles</h1>
	<hr/>
	@foreach ($articles as $article) 		
		<article>
			<h2><a href="{{ url('/articles', $article->id) }}" >{{ $article->name }}</a></h2>
			<div class="body"><h3>{{ $article->body }}</h3></div>
		</article>
	@endforeach
@stop