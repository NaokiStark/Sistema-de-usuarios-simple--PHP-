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

	// Finalmente, destruir la sesión.
	session_destroy();
}
$redirect_to='index.php';
Header('Location: '.$redirect_to);

?>