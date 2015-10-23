@extends('app')

@section('content')
	<h1>{{ $article->name }}</h1>
	<div class="body"> <h2>{{ $article->body }}</h2></div>
	<div class="body"> <h3>{{ $article->published_at->diffForHumans()}}</h3></div>

	@unless($article->tags->isEmpty())
		<h5>Tags</h5>
		<ul>
			@foreach($article->tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endunless
@stop