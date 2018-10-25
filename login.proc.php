<?php
	$link = mysqli_connect('localhost', 'root', '', 'reserva_recursos');
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	$query = mysqli_query($link, "SELECT User,Contrasenya_usuario FROM tbl_empleados");
	echo "<a href='index.php'> Volver</a>";
?>