<?php
	session_start();
	$id=$_SESSION['idusuario'];
	$recurso=$_REQUEST['tipo_recurso'];
	$link = mysqli_connect('localhost', 'root', '', '1819_exemple');
			
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	$consulta = mysqli_query($link, "SELECT * from tbl_reserva where id_empleado='$id'");
	if($row = mysqli_fetch_array($consulta)){
	mysqli_query($link, "DELETE FROM tbl_categoria WHERE nombre_recurso='$recurso'");
	header("Location: formulario_recursos.php");
	}else{
	echo 'no tienes permiso para eliminar esta reserva';
	}
?>