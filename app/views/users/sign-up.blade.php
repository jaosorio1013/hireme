@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Sign Up</h1>

			{{ Form::open(['route' => 'register', 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

				{{ App::make('field')->input('text', 'full_name') }}
				{{ App::make('field')->input('email', 'email') }}
				{{ App::make('field')->input('password', 'password') }}
				{{ App::make('field')->input('password', 'password_confirmation') }}

				<p>
					<input type="submit" value="Registrar" class="btn btn-success"/>
				</p>

			{{ Form::close() }}
		</div>
	</div>
</div>
@stop