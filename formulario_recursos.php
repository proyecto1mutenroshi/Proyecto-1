<!DOCTYPE html>
<html>
<head>

	<title> Main Page </title>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<?php
	$link = mysqli_connect('localhost', 'root', '', 'reserva_recursos');
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}

$query = mysqli_query($link, "SELECT * FROM tbl_recurso ORDER BY nombre_recurso");
	while($recursos = mysqli_fetch_array($query)){
		echo "Recurso: $recursos[nombre_recurso]<br>";
	}
	echo "<br>";
	//Variable de la sesión
	session_start();
	$_SESSION["usuario"]=$_POST["usuario"];
	echo "<h3>Hola " . $_SESSION['usuario'] . "</h3>";
	
?>
<br>
<!-- <<<<<<< HEAD -->
	<form action="formulario_recursos.proc.php" name="for2" method="POST">
<!-- ======= -->
		Nombre del recurso:
		<input type="text" name="tipo_recurso"><br>
		Tipo de recurso:
		<input type="select" name="nombre_recurso"><br>
		Hora inicial:
		<input type="time" name="hora_inicial"><br>
		Hora final:
		<input type="time" name="hora_final"><br>
		Día:
		<input type="date" name="dia"><br>
		<input type="submit" name="confirmar" value="confirmar">
		<input type="hidden" name="usuario2" value="usuario">
	</form>
	<h3>Reservas ya hechas</h3>
	<?php
		$query = mysqli_query($link, "SELECT * FROM tbl_reserva ORDER BY id_reserva, nombre_recurso, horainicio_reserva, horasalida_reserva, dia_reserva");
		while($recursos = mysqli_fetch_array($query)){
		echo "Recurso: $recursos[id_reserva], Nombre: $recursos[nombre_recurso], Hora Inicio: $recursos[horainicio_reserva] ,Hora Final: $recursos[horasalida_reserva], Día reserva: $recursos[dia_reserva]<br>";
	}
	?>
</body>
</html>
