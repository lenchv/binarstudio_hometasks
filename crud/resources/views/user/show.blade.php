@extends('app')
@section('pagetitle')
	Books {{ $user->firstname }} {{ $user->lastname }}
@stop

@section('content')
	<ul class="list-group">
	@foreach ($books as $book)
	  	<li class="list-group-item">
	  		<a href="{{ URL::to('books/' . $book->id) }}">
	  			{{ $book->author }}, {{ $book->title }}, {{ $book->year }}, {{ $book->genre }}
			</a>
			{!! Form::open(['url' => '/userbooks/' . $book->pivot->id, 'style' => "display: inline", 'method' => "DELETE"]) !!}
			{!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
		</li>
	@endforeach
	</ul>
	<a class="btn btn-primary" href="{{ URL::to('userbooks/' . $user->id) }}">Add book</a>
@stop