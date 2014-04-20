<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/assets/css/styles.css')}}">
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('/assets/js/japanese.js')}}"></script>
	<title>Japanese</title>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      {{ link_to_route("lists", "Japanese", null, ['class' => 'navbar-brand']) }}
    </div>

<?php
	$lists = [
		       'All Verbs' => 'vb', 
		        'Ru Verbs' => 'vb/ru', 
		         'U Verbs' => 'vb/u',
		     'U Verbs - u' => 'vb/u/u',
		   'U Verbs - tsu' => 'vb/u/tsu',
		    'U Verbs - ru' => 'vb/u/ru',
		    'U Verbs - mu' => 'vb/u/mu',
		    'U Verbs - bu' => 'vb/u/bu',
		    'U Verbs - nu' => 'vb/u/nu',
		    'U Verbs - ku' => 'vb/u/ku',
		    'U Verbs - gu' => 'vb/u/gu',
		    'U Verbs - su' => 'vb/u/su'
	];
?>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lists <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            @foreach($lists as $list => $link)
					<li>{{ link_to("/list/{$link}", $list) }}</li>
				@endforeach
	          </ul>
	        </li>
			@if(Auth::check())
				<li>{{ link_to_route("words.create", "Add") }}</li>
			@endif
		</ul>
	</div>
</nav>

<div class="container col-md-6 col-md-offset-3">
	{{ HTML::decode(link_to(URL::previous(), '<span class="glyphicon glyphicon-arrow-left"></span> back', ['class' => 'btn btn-default'])) }}
     @yield('content')
</div>
	
</body>
</html>