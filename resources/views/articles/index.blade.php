@extends('app')

@section('content')
	<h1>Articles</h1><a href="articles/create" class="btn btn-default">Create a new article</a>
	<hr/>
	@foreach ($articles as $article) 		
		<article>
			<h2><a href="{{ url('/articles', $article->id) }}" >{{ $article->name }} by {{ $article->user->username }}</a></h2>
			<div class="body"><h3>{{ $article->body }}</h3></div>
		</article>
	@endforeach
@stop