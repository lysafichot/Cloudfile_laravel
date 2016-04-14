<!DOCTYPE html>
<html>
<head>
	<title>Cloud - @yield('title')</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	{!!Html::style('css/home.css')!!}

</head>
<body>
	<header>
		<div id='open'>
			{{ HTML::image('img/bars.png', 'burger', array('id' => 'burger')) }}
		</div>
		<span>Hello {{ $name }} </span>
			{!! Form::open(array('url' => 'logout', 'id' => 'logout')) !!}
		<label>
			{{ Form::submit("Let's go !", ['name' =>'submit_logout','id' => 'submit_logout']) }}
			{{ HTML::image('img/logout.png') }}
		</label>
		{!! Form::close() !!}
	</header>
	<div id='container'>
		@section('sidebar')
		<nav id= 'nav'>
			<div id='cross'>{{ HTML::image('img/cross.png', 'cross', array('id' => 'logo_cross')) }}</div>
			<div class='menu'>
				{{ link_to_route('login', 'Compte utilisateur', "", array('class'=>'home_upload')) }}
			</div>
			<div class='menu'>
				{{ link_to_route('login', 'Upload files', "", array('class'=>'home_upload')) }}
			</div>
			<div class='menu'>
				{{ link_to_route('login', 'All files', "", array('class'=>'home_upload')) }}
			</div>

		</nav>

		@show
		<div id='content'>
			@section('menu')
			<div id='menu_file'>
				<ul>
					<li id='li_add_file'>
						<span id='add_file'>Add files </span>
						<div id='add_upload'>
							{!! Form::open(array('url' => '/file/upload', 'id' => 'upload', 'files' => true)) !!}
							<div class = 'field' id="field_title">
								{{ Form::label('title', 'Tiltle :', ['id' => 'label_title', 'class' => 'label']) }}
								{{ Form::text('title',null, ['class' => 'input']) }}
							</div>
							<div class = 'field' id="field_upload">
								{!! Form::file('file[]', array('multiple'=>true)) !!}
							</div>
							<div class = 'field' id="field_submit">
								{{ Form::submit("Upload !", ['name' =>'submit_upload','id' => 'submit_upload']) }}
							</div>
							{!! Form::close() !!}
						</div>
					</li>
				</ul>
			</div>
			@show

			@yield('content')

		</div>
	</div>

	{!!Html::script('js/script.js')!!}
</body>
</html>
