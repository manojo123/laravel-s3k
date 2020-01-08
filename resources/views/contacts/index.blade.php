@extends('layouts.app')

@section('content')
<div class="row">
	@forelse ($contacts as $contact)
		<div class="col-4">
			<h3><a href="/contacts/{{ $contact->id }}">CONTACT # {{ $contact->id }}</a></h3>
			<p>
				<b>Titulo:</b> {{ $contact->subject }}
			</p>
			<p>
				<b>Mensaje:</b> {{ $contact->message }}
			</p>
			<a href="/contacts/{{ $contact->id }}/edit" class="btn btn-warning btn-block">Editar</a>
			<form method="POST" action="/contacts/{{ $contact->id }}">
				@csrf
				@method('DELETE')

				<button class="btn btn-danger btn-block">Borrar</button>
			</form>
		</div>
	@empty
		<p>No hay contactos a mostrar</p>
	@endforelse
</div>
{{ $contacts->render() }}

@endsection