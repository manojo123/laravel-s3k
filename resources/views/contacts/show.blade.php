@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-12">
		<h3><a href="/contacts/">REGRESAR</a></h3>
		<p>
			<b>Titulo:</b> {{ $contact->subject }}
		</p>
		<p>
			<b>Mensaje:</b> {{ $contact->message }}
		</p>
	</div>
	
</div>

@endsection