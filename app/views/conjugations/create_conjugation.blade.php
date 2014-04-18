{{ Form::open(['url' => 'conjugations/store/'.$word->id]) }}
	@include('conjugations/conjugation_form', ['button_text' => 'save'])
{{ Form::close() }}