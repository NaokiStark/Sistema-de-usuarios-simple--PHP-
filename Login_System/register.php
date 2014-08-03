<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
</head>
<body>
<?php
require 'checksession.php';
#Si hay sesion, la destruimos

if($logged){
	$_SESSION = array();
	if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
	}
	session_destroy();
}
require 'connection.php';

# Comprobamos campos
if(!isset($_POST['user'], $_POST['pass'], $_POST['chkpass'])){
	die('Faltan Campos');
}

$user=strtolower(CleanString($_POST['user'], $mysql));
$pass=CleanStringPassword($_POST['pass'],$mysql);
$chkpass=CleanStringPassword($_POST['chkpass'], $mysql);

if(is_null($user) || $user =='' || strlen($user) < 4){
	die('El usuario debe tener más de 5 caracteres.');
}
if(is_null($pass) || $pass=='' || strlen($pass)< 4){
	die('La contraseña debe tener más de 5 caracteres.');
}
if($pass !== $chkpass){
	die('Las contraseñas no coinciden.');
}

# Protegemos la contraseña

$pass= md5(md5(CleanStringPassword($_POST['pass'], $mysql)).md5($user));

# Comprobamos si existe el usuario

$QueryCommand= "SELECT user FROM users WHERE user='" . $user . "' LIMIT 1";
$Query = $mysql->Query($QueryCommand);
if($Query->num_rows > 0){
	die('El usuario ya existe.');
}

$QueryCommand= "INSERT INTO users(user, pass) values('". $user ."','".$pass."')";
$Query = $mysql->Query($QueryCommand);
if(!$Query){
	die('Error al registrarse: ' . $mysql->error);
}

?>
	<p>Bienvenido <?php echo $user ?>! <a href="/">Ingresar</a></p>
</body>
</html>