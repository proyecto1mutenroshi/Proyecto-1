<?php
	session_start();
	$cadena=$_SESSION["usuario"];
	$link = mysqli_connect('localhost', 'root', '', '1819_exemple');
			
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	$query = mysqli_query($link, "SELECT * from tbl_reserva where id_empleado='$_SESSION[idusuario]'");
	if($row['id_empleado'] = mysqli_fetch_array($query)){
	mysqli_query($link, "DELETE FROM tbl_categoria WHERE nombre_recurso=$_REQUEST[nombre_recurso]");
	header("Location: formulario_recursos.php");
	}else{
	echo 'no tienes permiso para eliminar esta reserva';
	header("Location: formulario_recursos.php");
	}
?>