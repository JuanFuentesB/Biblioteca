<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Biblioteca</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<style>
		p {
			font-size: 2rem;
			text-align: right;
			margin-top: 15px;
		}
		a {
			outline: none;
			text-decoration: none;
			color: white;
		}
		a:hover {
			background: #00a5db;
			color: white;
		}
	</style>
	<style>
		@yield('estilos');
	</style>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<p>	<a href="{{ route('cerrarsession') }}"> Cerrar Session</a> </p>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div class="col-sm-12  main">
        <div class="row">
			<div class="col-lg-12">
                <h2>Biblioteca</h2>
			</div>
			@yield('contenido')
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>