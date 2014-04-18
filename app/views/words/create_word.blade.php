@extends('layouts.master')

@section('content')
    {{ Form::open(array('route' => 'words.store')) }}
		@include('words/word_form', ['button_text' => 'save'])
	{{ Form::close() }}
@stop