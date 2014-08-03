<?php
/* 
   register_session.php by Fabián (http://taringa.net/max_pc)
   Free for use and modification (Libre para uso y modificación)
*/
   # Abrimos sesion
   session_start();

   # Tiempo máximo en el cual dura la sesión, expresada en segundos.

   $max_session_duration=1800;


   # Obtenemos la hora de login y le agregamos el tiempo máximo de la sesión [en TimeStamp]

   $Ex_session= time() + $max_session_duration;

   # Generamos la clave con el tiempo de expirado.

   $sKey= md5(md5($user).md5($pass.md5($Ex_session)).md5($Ex_session));

   
   # Guardamos en la base de datos la clave y cuando expira.
    
	$QueryCommand= "UPDATE users SET session_key='".$sKey."' WHERE user='" . $user."'";
	$Query = $mysql->Query($QueryCommand);
	if (!$Query){
		die('Error al loguearse: ' . $mysql->error);
	}

	# Si todo sale bien, guardamos en la sesión

	$_SESSION['exKey']=$Ex_session;
	$_SESSION['sKey']=$sKey;

?>