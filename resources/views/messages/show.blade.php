@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-6 col-sm-6">
				<h1>Mensaje</h1>
				<p>{{ $message->body }}</p>
				<small>Enviado por: {{ $message->sender->name }}</small>
			</div>
		</div>
	</div>
@endsection