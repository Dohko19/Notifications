@extends('layouts.app')
@section('content')
<div class="container">
	<h1>Notificaciones</h1>
	<div class="row">
		<div class="col-md-6 col-sm-6">
		<h2>No Leidas</h2>
				<ul class="list-group">
					@foreach ($unreadNotifications as $unreadNotification)
						  <li class="list-group-item">
						  	<a href="{{ $unreadNotification->data['link'] }}">
						  	{{ $unreadNotification->data['text'] }}
						  	</a>
						  	<form method="POST" action="{{ route('notifications.read', $unreadNotification->id) }}" class="pull-right">
						  		@csrf
						  		{{ method_field('PATCH') }}
						  		<button type="submit" class="btn btn-danger btn-xs pull-right">x</button>
						  	</form>
						  </li>
					@endforeach
				</ul>
		</div>
		<div class="col-md-6 col-sm-6">
			<h2>Leidas</h2>
				<ul class="list-group">
					@foreach ($readNotifications as $readNotification)
						    <li class="list-group-item">
						  	<a href="{{ $readNotification->data['link'] }}">
						  	{{ $readNotification->data['text'] }}
						  	</a>
						  	<form method="POST" action="{{ route('notifications.destroy', $readNotification->id) }}" class="pull-right">
						  		@csrf
						  		{{ method_field('DELETE') }}
						  		<button type="submit" class="btn btn-danger btn-xs pull-right">x</button>
						  	</form>
						  </li>
					@endforeach
				</ul>
		</div>
	</div>
</div>
@endsection