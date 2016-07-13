@extends('app')
@section('pagetitle')
Create user
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
	
	{!! Form::open(['url' => 'users']) !!}
		<div class="form-group">
			{!! Form::label('firstname', 'Firstname') !!}
			{!! Form::text('firstname', $request->old('firstname'), ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('lastname', 'Lastname') !!}
			{!! Form::text('lastname', $request->old('lastname'), ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">	
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', $request->old('email'), ['class' => 'form-control']) !!}
		</div>

		{!! Form::submit("Create", ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@stop