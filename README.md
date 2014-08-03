Sistema de usuarios simple -PHP-
================================

Pequeño sistema de gestion de usuarios y sesiones.

¿Cómo utilizarlo?
-----------------

1. Sube los archivos a servidor
2. Editar el archivo *connection.php*
3. Editar la variable *$redirect_to* del archivo *checksession.php*.

connection.php
--------------

Este archivo contiene la conexion a la base de datos, este archivo hay que editar hacia dónde se conectará para obtener los datos de usuario.

```php
<?php
/* connection.php */

$DBhost='localhost'; #Host del servidor
$DBport=''; # Nada para default
$DBuser='user'; # Usuario del servidor
$DBpass='pass'; # Contraseña del servidor
$DBdb='test';   # Base de datos

# ...

```

¿Cómo se utiliza en caso de necesitar en una petición de usuario?
-----------------------------------------------------------------

Es sencillo, solamente con este bloque al principio del archivo es suficiente para poder realizar la comprobación de sesión.

```php
<?php
	# Comprobamos si está logueado, nada de cosas raras...
	
	require 'checksession.php'; # Llamamos al archivo, y éste hace todo.
	
	if(!$logged){ # La variable $logged está reservada, ¡no reescribirla!
		# Hacer algo en caso de no estar logueado
		# Por ejemplo:
		
		# die('Debes estar logueado');
		
	}

# Continua el código

```

Necesito más tiempo de sesión, ¿Cómo lo cambio?
-----------------------------------------------

Simple, edita la variable **$max_session_duration** con el tiempo deseado en el archivo **register_session.php**, expresado **en segundos**.

```php
<?php
/* 
   register_session.php by Fabián (http://taringa.net/max_pc)
   Free for use and modification (Libre para uso y modificación)
*/
   # Abrimos sesion
   session_start();

   # Tiempo máximo en el cual dura la sesión, expresada en segundos.

   $max_session_duration=1800;


```

¡Un bicho, mátalo!
------------------

Este es un proyecto de libre modificación y uso, en caso de encontrar un **bug** se agradecerá informarlo.

Fabián.
