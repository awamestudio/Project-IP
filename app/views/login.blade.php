<!-- app/views/login.blade.php -->
{{ Form::open(array('url' => 'home')) }}

	<!-- if there are login errors, show them here -->
	<div class="col-lg-12 text-left  alert alert-danger">
		{{ $errors->first('email') }}
		{{ $errors->first('password') }}
	</div>

	<div class="col-lg-12 text-left">
		{{ Form::label('email', 'Email Address', array('class'=>'control-label')) }}
		{{ Form::text('email', Input::old('email'), array('class'=>'form-control','placeholder' => 'awesome@awesome.com')) }}
	</div>
	<br />
	<div class="col-lg-12 text-left">
		{{ Form::label('password', 'Password', array('class'=>'control-label')) }}
		{{ Form::password('password', array('class'=>'form-control','placeholder'=>'Password')) }}
	</div>
	<br />
	<div class="col-lg-6 col-lg-offset-6">{{ Form::submit('login', array('class'=>'btn btn-lg btn-primary btn-block')) }}</div>
{{ Form::close() }}