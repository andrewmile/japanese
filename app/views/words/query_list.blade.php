@extends('layouts.master')

@section('content')
     
	<h1>Lists</h1>
	
		<div class="list-group">
			{{ link_to("/words", 'All', ['class' => 'list-group-item']) }}
			@foreach($lists as $list => $link)
				{{ link_to("/list/{$link}", $list, ['class' => 'list-group-item']) }}
			@endforeach
		</div>

@endsection