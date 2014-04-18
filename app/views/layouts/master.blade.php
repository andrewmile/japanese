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

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
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