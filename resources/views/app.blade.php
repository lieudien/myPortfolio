<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	@include('flash::message')
	@yield('content')
</div>

@yield('footer')

<script src="//code.jquery.com/jquery-2.1.4.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
	$('div.alert').delay(3000).slideUp(300);
	$("#flash-overlay-modal").modal();
</script>
</body>
</html>

