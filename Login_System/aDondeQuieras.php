<?php
	# Comprobamos si está logueado, nada de cosas raras...
	require 'checksession.php';
	if(!$logged){
		Header('Location: index.php');
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Esctructura de tabla</title>
</head>
<body>
	<h1>Estructura de tabla:</h1>
	<pre>
		+----+---------+------------+-----------------+
		| id | user    | pass       | session_key     |
		+----+--------+-------------+-----------------+
		|  0 | Usuario | Contraseña | Clave de sesión |
		+----+---------+------------+-----------------+
	</pre>
	<a href="logout.php">Cerrar sesión</a>
</body>
<style>
	.form{
		text-align: center;
	}
	pre{
		border: none;
		border: solid 3px #B4B4B4;
		padding: 5px;
		border-radius: 2px;
		color: #333;
		outline: none;
		max-width: 572px;
	}
	body{
		font-family: 'Arial', 'Helvetica', sans-serif;
		font-size: .9em;
		color: #333;
	}
	a{
		color: #256BB8;
		font-weight: bold;
		text-decoration: none;
		font-size: 1em;	
	}
	a:hover{
		text-decoration:underline;
	}
</style>
</html>
