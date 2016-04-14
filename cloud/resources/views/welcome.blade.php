<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	{!!Html::style('css/style.css')!!}

</head>
<body>

	<div id='form_login'>

		<div id='logo'>
		<h1>Sign in</h1>
		</div>
		<div id='fields'>
			<div id='erreur'>
			@if(Session::has('erreur'))
				<p class="alert alert-info">{{ Session::get('erreur') }}</p>
					{{ Session::forget('erreur') }}

			@endif
			</div>
			{!! Form::open(array('url' => '/', 'id' => 'login')) !!}
			<div class = 'field' id="field_username">
				{{ Form::label('username', 'Username', ['id' => 'label_username', 'class' => 'label']) }}
				{{ Form::text('username',null, ['class' => 'input']) }}
			</div>
			<div class = 'field' id="field_password">
				{{ Form::label('password', 'Password', ['id' => 'label_password', 'class' => 'label']) }}
				{{ Form::password('password', ['class' => 'input']) }}
			</div>
			<div class = 'field' id="field_submit">
			{{ Form::submit("Let's go !", ['name' =>'submit_log','id' => 'signin']) }}
			</div>
			{!! Form::close() !!}
		</div>
		<div id='signup_link'>
			<span>{{ link_to_route('register', 'No registered ? Sign up !', "", array('class'=>'link')) }} </span>
		</div>
	</div>

	{!!Html::script('js/script.js')!!}
</body>
</html>
