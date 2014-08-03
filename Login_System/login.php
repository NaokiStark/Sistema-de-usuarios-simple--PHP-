<?php
$redirect_to='aDondeQuieras.php';
/* login.php */
require 'connection.php';

function CleanString($text, $mysqlHandler){

	$text= $mysqlHandler->real_escape_string($text);

	return $text;
}
function CleanStringPassword($text, $mysqlHandler){
  $text= $mysqlHandler->real_escape_string($text);
  return $text;
}
$user= strtolower(CleanString($_POST['user'], $mysql));

# En el registro tiene que estar de la misma manera
$pass= md5(md5(CleanStringPassword($_POST['pass'], $mysql)).md5($user));

# Buscamos coincidencias
$mUser='';
$mPass='';
$QueryCommand= "SELECT user, pass FROM users WHERE user='" . $user . "' LIMIT 1";
$Query = $mysql->Query($QueryCommand);
if(!$Query){
	die('El usuario no existe' . $mysql->error);
}
while ($fila = $Query->fetch_assoc()){
	$mUser.=$fila['user'];
	$mPass.=$fila['pass'];
}

if ($mUser !== $user || $mPass !== $pass){
	die('Usuario/contraseña incorrectos.');
}

# Si todo sale bien, lo guardamos en la sesión.

require 'register_session.php';

# aDondeQuieras.php = es donde vas a redirigir cuando terminó el login.

Header('Location: '.$redirect_to);

?>