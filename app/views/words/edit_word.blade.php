@extends('layouts.master')

@section('content')

    {{ Form::model($word, ['method' => 'PUT', 'route' => ['words.update', $word->id]]) }}
		@include('words/word_form', ['button_text' => 'update'])
	{{ Form::close() }}

	<div>
    	@include('conjugations/create_conjugation', ['button_text' => 'save'])
    </div>

@stop