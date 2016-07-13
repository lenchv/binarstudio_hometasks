@extends("app")
@section('pagetitle')
User list
@stop

@section('content')
<div class="panel panel-default">
  <div class="panel-body">
		<a class="btn btn-success" href="{{ URL::to('/users/create') }}">Create user</a>
  </div>
</div>
<table class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>ID</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Email</th>
		<th>Books</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->firstname }}</td>
				<td>{{ $user->lastname }}</td>
				<td>{{ $user->email }}</td>
				<td>
					<a class="btn btn-warning" href="{{ URL::to('/users/' . $user->id) }}">Show</a>
				</td>
				<td>
					<a class="btn btn-info" href="{{ URL::to('/users/' . $user->id . '/edit') }}">Edit</a>
					{!! Form::open(['url' => '/users/' . $user->id, 'class' => "pull-right", 'method' => "DELETE"]) !!}
					{!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{ $users->links() }}
@stop
