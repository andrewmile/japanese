@extends('layouts.master')

@section('content')

    {{ Form::model($word, ['method' => 'PUT', 'route' => ['words.update', $word->id]]) }}
		@include('words/word_form', ['button_text' => 'update'])
	{{ Form::close() }}

	<div>
		<br>
		@include('conjugations/conjugation_list')
		<button class="btn btn-default" data-toggle="modal" data-target="#word-conjugation-form">
  			<span class="glyphicon glyphicon-plus"></span> Add Conjugation
		</button>
    	@include('conjugations/create_conjugation', ['button_text' => 'save'])
    </div>

@stop