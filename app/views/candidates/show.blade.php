@extends('layout')

@section('content')
<div class="container">
	<h1>{{ $candidate->user->full_name }}</h1>

	<p>
		Categoría:
		<a href="{{ route('category', [$candidate->category->slug, $candidate->category->id]) }}">
			{{ $candidate->category->name }}
		</a>
	</p>

	<p>
		Tipo de trabajo:
		{{ $candidate->job_type_title }}
	</p>

	<p>
		Website:
		{{ $candidate->website_url }}
	</p>

	<h4>Descripción:</h4>

	<p>{{ $candidate->description }}</p>

	@if(is_admin())
		<p>
			<a href="{{ route('admin_candidate_edit', [$candidate->id]) }}" class="btn btn-info">Editar candidato</a>
		</p>
	@endif
</div>
@stop