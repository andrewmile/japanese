<div id="word-conjugation-form" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-content col-md-6 col-md-offset-3">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Conjugation for {{ $word->word }}</h4>
      </div>
      <div class="modal-body">

		{{ Form::open(['url' => 'conjugations/store/'.$word->id]) }}
			@include('conjugations/conjugation_form', ['button_text' => 'save'])
		{{ Form::close() }}

	  </div>
	</div>
</div>

