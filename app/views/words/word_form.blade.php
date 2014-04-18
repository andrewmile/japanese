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

<div class="form-group">
	{{ Form::label('english', 'English') }}
	{{ Form::text('english', $value = null, array('class' => 'form-control')) }}
	{{ $errors->first('english') }}
</div>

<?php
$types = [
	'' => '',
	'adj' => 'Adjective',
	'n' => 'Noun',
	'vb' => 'Verb'
];
?>

<div class="form-group">
	{{ Form::label('type', 'Type') }}
	{{ Form::select('type', $types, $value = null, array('class' => 'form-control')) }}
	{{ $errors->first('type') }}
</div>

<?php
$subtypes = [
	'adj' => [
		'' => '',
		'i' => 'i',
		'na' => 'na'
	],
	'vb' => [
		'' => '',
		'u' => 'u',
		'ru' => 'ru'
	]
];
?>

<?php $subtype_class = !$word->type ? 'temp-hide' : '' ?>

<div class="form-group adj vb subtype {{$subtype_class}}">
	{{ Form::label('subtype', 'Subtype') }}

	@foreach($subtypes as $subtype => $values)
		<?php $subtype_value_class = !($word->type == $subtype) ? 'temp-hide' : '' ?>
		{{ Form::select('subtype', $values, $value = null, array('class' => 'form-control ' . $subtype_value_class . ' ' . $subtype)) }}
	@endforeach

	{{ $errors->first('subtype') }}
</div>

{{ Form::submit(isset($button_text) ? $button_text : 'save', ['class' => 'btn btn-primary']) }}

@if(isset($button_text) && $button_text == 'save')
	{{ Form::submit('save and add new', ['name' => 'add_new', 'class' => 'btn btn-primary']) }}
@endif