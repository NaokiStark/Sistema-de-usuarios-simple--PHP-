<?php
/* connection.php */

$DBhost='localhost';
$DBport=''; # Nada para default
$DBuser='user';
$DBpass='pass';
$DBdb='test';


if ($DBport != ""){
$HostFull = $DBhost . ":" . $DBport;
}
else
{
$HostFull = $DBhost;
}

$mysql = @new mysqli($HostFull, $DBuser, $DBpass, $DBdb);
if($mysql->connect_error){
      die("Error en la conexion : ".$mysql->connect_errno."-".$mysql->connect_error);
}
$mysql->set_charset("utf-8");
