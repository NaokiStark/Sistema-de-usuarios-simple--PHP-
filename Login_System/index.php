<?php
require 'checksession.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<?php 
		if(!$logged){
	?>
	<div class="form">
		<h3>Ingresar</h3>
		<form action="login.php" method="POST">
			<p><input type="text" name="user" placeholder="Usuario"></p>
			<p><input type="password" name="pass" placeholder="Contraseña"></p>
			<p><input type="submit" value="Ingresar"></p>
		</form>
	</div>
	<div class="form">
		<h3>Registrarse</h3>
		<form action="register.php" method="POST">
			<p><input type="text" name="user" placeholder="Usuario"></p>
			<p><input type="password" name="pass" placeholder="Contraseña"></p>
			<p><input type="password" name="chkpass" placeholder="Repita contraseña"></p>
			<p><input type="submit" value="Registrarse"></p>
		</form>
	</div>
	<?php
		}
		else{
			?>
			<div class="form">
				Usted se encuentra logueado. <a href="aDondeQuieras.php">Ingresar</a>
			</div>
			<?php
		}
	?>
</body>
<style>
	.form{
		text-align: center;
	}
	input[type='text'], input[type='password']{
		border: none;
		border: solid 3px #B4B4B4;
		padding: 5px;
		border-radius: 2px;
		font-family: 'Arial', 'Helvetica', sans-serif;
		font-size: .9em;
		color: #333;
		outline: none;
	}
	input[type='submit']{
		border: none;
		background: #22A23C;
		font-size: 1em;
		color: #f0f0f0;
		padding: 13px 25px;
		border-bottom: solid 3px #1F7C32;
		cursor: pointer;
		font-weight: 600;
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