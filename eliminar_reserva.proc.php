<?php
	session_start();
	$id=$_SESSION['idusuario'];
	echo $id;
	$recurso=$_REQUEST['tipo_recurso'];
	$link = mysqli_connect('localhost', 'root', '', 'reserva_recursos');
			
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	$consulta = mysqli_query($link, "SELECT id_empleado from tbl_reserva WHERE nombre_recurso='".$recurso."'");
	//echo "SELECT id_empleado from tbl_reserva WHERE nombre_recurso='".$recurso."'";
	foreach ($consulta as $key) {
		if ($key['id_empleado'] == $id){
			echo 'hola, he entrado';
			echo "DELETE FROM tbl_categoria WHERE nombre_recurso='$recurso'";
			mysqli_query($link, "DELETE FROM tbl_reserva WHERE nombre_recurso='$recurso'");
			header("Location: formulario_recursos.php");
		}else{
		echo"<script type=\"text/javascript\">alert('no tienes permiso para eliminar esta reserva'); window.location='formulario_recursos.php';</script>";
		echo $recurso;
		header("Location: formulario_recursos.php");
			}
	}
	