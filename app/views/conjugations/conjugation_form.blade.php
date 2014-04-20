<?php
$conjugations = [
	'' => '',
	'negative' => 'negative',
	'past' => 'past',
	'negative past' => 'negative past',
	'te' => 'te',
	'masu' => 'masu'
];
?>

<div class="form-group">
	{{ Form::label('form', 'Form') }}
	{{ Form::select('form', $conjugations, $value = null, array('class' => 'form-control')) }}
	{{ $errors->first('form') }}
</div>

<div class="form-group">
	{{ Form::label('word', 'Word') }}
	{{ Form::text('word', $value = null, array('class' => 'form-control')) }}
	{{ $errors->first('word') }}
</div>

<div class="form-group">
	{{ Form::label('kana', 'Kana') }}
	{{ Form::text('kana', $value = null, array('class' => 'form-control')) }}
	{{ $errors->first('kana') }}
</div>

<div class="form-group">
	{{ Form::label('romaji', 'Romaji') }}
	{{ Form::text('romaji', $value = null, array('class' => 'form-control')) }}
	{{ $errors->first('romaji') }}
</div>

{{ Form::submit(isset($button_text) ? $button_text : 'save', ['class' => 'btn btn-primary']) }}