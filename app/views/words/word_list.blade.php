@extends('layouts.master')

@section('content')

<div class="btn-group toggle-btns" data-toggle="buttons">
  <label class="btn btn-default active">
    <input type="checkbox"> Kana
  </label>
  <label class="btn btn-default active">
    <input type="checkbox"> English
  </label>
</div>
     
    @if(isset($type))
		<h1>Word List - {{ $subtype . ' ' . $type }}</h1>
	@else
		<h1>Word List - All</h1>
	@endif
	
	@if($words->count())
		
		<div class="list-group word-list">
			@foreach($words as $word)
				<?php 
					$li_content = '<span class="li-word">'.$word->word.'</span>';
					$li_content .= '<span class="li-kana">'.$word->kana.'</span>';
					$li_content .= '<span class="li-english">'.$word->english.'</span>';
				?>
				{{ HTML::decode(link_to("/words/{$word->id}", $li_content, ['class' => 'list-group-item'])) }}
			@endforeach
		</div>

	@else

		<p>There are no words to display</p>

	@endif

@endsection