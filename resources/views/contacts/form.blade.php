<form method="POST" action="/contacts/{{ isset($contact) ? $contact->id : '' }}">
	@csrf
	@isset($contact)
		@method('PUT')
	@endisset
	
	<div class="form-group">
		<label for="subject">Asunto</label>
		<input 
			type="text" 
			name="subject" 
			class="form-control" 
			placeholder="" 
			value="{{ isset($contact) ? $contact->subject : '' }}">
	</div>

	<div class="form-group">
		<label for="message">Mensaje</label>
		<textarea 
			name="message" 
			placeholder="" 
			rows="10" 
			cols="100" 
			maxlength="999" 
			class="form-control">{{ isset($contact) ? $contact->message : '' }}</textarea>
	</div>

	<button type="submit" class="btn btn-primary">Enviar</button>

</form>