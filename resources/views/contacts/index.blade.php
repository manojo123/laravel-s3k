@extends('layouts.app')

@section('content')
<div class="row">
	@forelse ($contacts as $contact)
		<div class="col-4">
			<h3><a href="/contacts/{{ $contact->id }}">CONTACT # {{ $contact->id }}</a></h3>
			@can('viewAny', $contact)
				<p>
					<b>Super User:</b> Hello Super User
				</p>
			@endcan
			<p>
				<b>Titulo:</b> {{ $contact->subject }}
			</p>
			<p>
				<b>Mensaje:</b> {{ Str::limit($contact->message, 20) }}
			</p>
			@auth
			<a href="/contacts/{{ $contact->id }}/edit" class="btn btn-warning btn-block">Editar</a>
			<form method="POST" action="/contacts/{{ $contact->id }}">
				@csrf
				@method('DELETE')

				<button class="btn btn-danger btn-block">Borrar</button>
			</form>
			@endauth
		</div>
	@empty
		<p>No hay contactos a mostrar</p>
	@endforelse
</div>
{{ $contacts->render() }}

@endsection