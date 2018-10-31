<?php
	$user=$_REQUEST['user'];
	$contrasenya=$_REQUEST['contrasenya'];

	if(empty($user) || empty($contrasenya)){
	echo"<script type=\"text/javascript\">alert('Campos Vacios'); window.location='index.php';</script>";
	}

	$link = mysqli_connect('localhost', 'root', '', 'reserva_recursos');
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	$query = mysqli_query($link, "SELECT * from tbl_empleados where nusuario_empleado='$user'");

	if($row = mysqli_fetch_array($query)){
		if($row['contrasenya_empleado'] == $contrasenya){
			session_start();
			$_SESSION['usuario'] = $user;
			$_SESSION['idusuario'] = $row['id_empleado'];
			header("Location: formulario_recursos.php");
		}else{
			echo"<script type=\"text/javascript\">alert('Usuario o Contraseña incorrectos'); window.location='index.php';</script>";
		}
	}else{
		echo"<script type=\"text/javascript\">alert('Usuario o Contraseña incorrectos'); window.location='index.php';</script>";
	}
?>