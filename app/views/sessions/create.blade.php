@extends('layouts.master')

@section('content')
	{{ Form::open(['route' => 'sessions.store']) }}

		<div class="form-group">
			{{ Form::label('email', 'email') }}
			{{ Form::text('email', $value = null, array('class' => 'form-control')) }}
			{{ $errors->first('email') }}
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', array('class' => 'form-control')) }}
			{{ $errors->first('password') }}
		</div>

		{{ Form::submit(isset($button_text) ? $button_text : 'login', ['class' => 'btn btn-primary']) }}

	{{ Form::close() }}
@stop