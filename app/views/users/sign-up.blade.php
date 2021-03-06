@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Sign Up</h1>

			{{ Form::open(['route' => 'register', 'method' => 'POST', 'role' => 'form', 'novalidate']) }}

				{{ Field::text('full_name') }}
				{{ Field::email('email') }}
				{{ Field::password('password') }}
				{{ Field::password('password_confirmation') }}

				<p>
					<input type="submit" value="Registrar" class="btn btn-success"/>
				</p>

			{{ Form::close() }}
		</div>
	</div>
</div>
@stop