<?php 
/* 
  checksession.php by Fabián
  http://taringa.net/max_pc
*/
  # Esto es para redireccionar a donde desees, es útil.
  $redirect_to='aDondeQuieras.php';

session_start();
function CleanString($text, $mysqlHandler){

  $text= $mysqlHandler->real_escape_string($text);
  $text= ereg_replace("[^A-Za-z0-9ñÑ]", "", $text);
  return $text;
}

function CleanStringPassword($text, $mysqlHandler){
  $text= $mysqlHandler->real_escape_string($text);
  return $text;
}
$logged=true;
$Now=time();

# Si existen las variables de $_SESSION

if (!isset($_SESSION['sKey'], $_SESSION['exKey'])){ 
   $logged=false;
}else{

  $session_expires=$_SESSION['exKey'];

  # Si expiró la sesión o la variable no es numérica

  if ($Now > $session_expires || !is_numeric($session_expires)){
    $logged=false;
  }
  else{

    # Tomamos la clave de la base de datos

    require 'connection.php';

    $session_key=CleanString($_SESSION['sKey'], $mysql);

    $QueryCommand= "SELECT session_key FROM users WHERE session_key='" . $session_key . "' LIMIT 1";
    $Query = $mysql->Query($QueryCommand);

    $Matched='';
    while($fila = $Query->fetch_assoc()){
      $Matched.=$fila['session_key'];
    }

    # Comprobamos de que coincida

    if($Matched !== $session_key){
      $logged=false;
    }
    else{
      $logged=true;
    }
  }
}

?>