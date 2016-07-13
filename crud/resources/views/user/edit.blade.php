@extends('app')
@section('pagetitle')
Edit user
@stop

@section('content')
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('firstname', 'Firstname') !!}
			{!! Form::text('firstname', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('lastname', 'Lastname') !!}
			{!! Form::text('lastname', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">	
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>

		{!! Form::submit("Update", ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@stop