<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	{!!Html::style('css/style.css')!!}

</head>
<body>

	<div id='form_sign'>

		<div id='logo'>
		<h1>Sign up</h1>
		</div>
		<div id='fields'>
			{!! Form::open(array('url' => 'registration', 'id' => 'sign')) !!}
			<div id='identifiants' class='sign_row'>
				<div class = 'field' id="field_username">
					{{ Form::label('username', 'Username', ['id' => 'label_username', 'class' => 'label']) }}
					{{ Form::text('username',null, ['class' => 'input']) }}
				</div>
				<div class = 'field' id="field_password">
					{{ Form::label('password', 'Password', ['id' => 'label_password', 'class' => 'label']) }}
					{{ Form::password('password', ['class' => 'input']) }}
				</div>
			</div>
			<div id='infos' class='sign_row'>
				<div class = 'field' id="field_lastname">
					{{ Form::label('', 'Lastname', ['id' => 'label_lastname', 'class' => 'label']) }}
					{{ Form::text('lastname',null, ['class' => 'input']) }}
				</div>
				<div class = 'field' id="field_name">
					{{ Form::label('Name', 'Name', ['id' => 'label_Name', 'class' => 'label']) }}
					{{ Form::text('name',null, ['class' => 'input']) }}
				</div>
			</div>
			<div class='sign_row'>
				<div class = 'field' id="field_email" >
					{{ Form::label('email', 'Email', ['id' => 'label_email', 'class' => 'label']) }}
					{{ Form::email('email',null, ['class' => 'input']) }}
				</div>
				<div class = 'field' id="field_birth" >
					{{ Form::label('birth', 'Birthdate', ['id' => 'label_birthdate', 'class' => 'label']) }}
					{{ Form::date('birthdate',null, ['class' => 'input']) }}
				</div>
			</div>

			<div class ='field' id="field_submit">
			{{ Form::submit("Let's go !", ['name' =>'submit_log','id' => 'signin']) }}
			</div>
			{!! Form::close() !!}
		</div>
		<div id='login_link'>
		<span>
		{{ link_to_route('login', 'Yet registered ? Log in !', "", array('class'=>'link')) }}
		</span>
		</div>
	</div>

	{!!Html::script('js/script.js')!!}
</body>
</html>
