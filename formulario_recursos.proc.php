<?php
	$tipo_recurso=$_POST['tipo_recurso'];
	$nombre_recurso=$_POST['nombre_recurso'];
	$hora_i=$_POST['hora_inicial'];
	$hora_f=$_POST['hora_final'];
	$dia=$_POST['dia']

	if(empty($tipo_recurso,$nombre_recurso,$hora_i,$hora_f,$dia)){
	echo "campos vacios";
	header("Location: formulario_recursos.php");
	}
	$link = mysqli_connect('localhost', 'root', '', 'reserva_recursos');
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	$query = mysqli_query($link, "SELECT * from tbl_recursos where nusuario_empleado = '" . $user . "'");
?>