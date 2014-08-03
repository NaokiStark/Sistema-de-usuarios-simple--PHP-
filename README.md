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

