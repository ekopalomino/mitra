<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mitra Agrinesia</title>
	<link href="{{ asset('css/front.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
	<img src="{{ asset('logo_front.png') }}" alt="profile picture" class="profile-picture">
	<div class="profile-name">Mitra Agrinesia</div>
	@yield('content')
</body>
</html>