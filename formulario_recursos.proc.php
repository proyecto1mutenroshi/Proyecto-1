<?php
	$nombre_recurso=$_POST['tipo_recurso'];
	$hora_i=$_POST['hora_inicial'];
	$hora_f=$_POST['hora_final'];
	$dia=$_POST['dia'];
	$id=$_POST['idusuario'];

	if(($nombre_recurso=="") && ($hora_i=="") && ($hora_f=="") && ($dia=="")){
		echo"<script type=\"text/javascript\">alert('Tienes que rellenar todos los campos'); window.location='formulario_recursos.php';</script>"; 
	}
	$link = mysqli_connect('localhost', 'root', '', 'reserva_recursos');
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	
	$query = mysqli_query($link, "INSERT INTO tbl_reserva (id_empleado,nombre_recurso, horainicio_reserva, horasalida_reserva, dia_reserva) VALUES ('$id','$nombre_recurso', '$hora_i', '$hora_f', '$dia')");
	//echo "INSERT INTO tbl_reserva (id_empleado,nombre_recurso, horainicio_reserva, horasalida_reserva, dia_reserva) VALUES ('$id','$nombre_recurso', '$hora_i', '$hora_f', '$dia')"
	 header("Location: formulario_recursos.php");
		
?>
