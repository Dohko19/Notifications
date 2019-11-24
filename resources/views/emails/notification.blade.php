<!DOCTYPE html>
<html>
<head>
	<title>Notification</title>
</head>
<body>
	<h1>{{ $user->name }}</h1>
	<p>Has recibido un mensaje </p>
	<a href="{{ route('messages.show', $msg->id) }}">Clik aqui para ver el mensaje</a>
	<p>Gracias por usar nuestra aplicacion</p>
</body>
</html>