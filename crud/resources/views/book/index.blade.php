@extends("app")

@section('pagetitle')
Books list
@stop

@section('content')
<div class="panel panel-default">
  <div class="panel-body">
		<a class="btn btn-success" href="{{ URL::to('/books/create') }}">Add book</a>
  </div>
</div>
<table class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Author</th>
		<th>Year</th>
		<th>Genre</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
		@foreach($books as $book)
			<tr>
				<td>{{ $book->id }}</td>
				<td>{{ $book->title }}</td>
				<td>{{ $book->author }}</td>
				<td>{{ $book->year }}</td>
				<td>{{ $book->genre }}</td>
				<td>
					<a class="btn btn-info" href="{{ URL::to('/books/' . $book->id . '/edit') }}">Edit</a>
					<a class="btn btn-warning" href="{{ URL::to('/books/' . $book->id) }}">Show</a>
					{!! Form::open(['url' => '/books/' . $book->id, 'class' => "pull-right", 'method' => "DELETE"]) !!}
					{!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{ $books->links() }}
@stop