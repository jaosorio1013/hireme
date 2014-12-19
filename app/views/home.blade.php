@extends('layout')

@section('content')
	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<div class="container">
			<h1>HireMe</h1>
			<p>Proyecto que estamos costruyendo con Laravel para el curso profecional de PHP y Laravel de Mejorando.la:</p>
			@if(Auth::guest())
				<p>
					<a class="btn btn-primary btn-lg" href="{{ route('sign_up') }}" role="button">Postúlate</a>
				</p>
			@endif
		</div>
	</div>

	<div class="container">
		<h1>Últimos candidatos</h1>

		@foreach($latest_candidates AS $category)
			<h2>{{ $category->name }}</h2>

			<table class="table table-striped">
				<tr>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Descripción</th>
					<th>Ver</th>
				</tr>
				@foreach($category->candidates AS $candidate)
					<tr>
						<td>{{ $candidate->user->full_name }}</td>
						<td>{{ $candidate->job_type_title }}</td>
						<td>{{{ $candidate->description }}}</td>
						<td width="50">
							<a href="{{ route('candidate', [$candidate->slug, $candidate->id]) }}" class="btn btn-info">Ver</a>
						</td>
					</tr>
				@endforeach
			</table>

			<p>
				<a href="{{ route('category', [$category->slug, $category->id]) }}">
					Ver todos en {{ $category->name }}
				</a>
			</p>
		@endforeach
	</div>
@stop