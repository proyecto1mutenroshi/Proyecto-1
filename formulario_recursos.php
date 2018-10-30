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
	//Muestra los recursos que tenemos
	// $query = mysqli_query($link, "SELECT * FROM tbl_recurso ORDER BY nombre_recurso");
	// 	while($recursos = mysqli_fetch_array($query)){
	// 		echo "Recurso: $recursos[nombre_recurso]<br>";
	// 	}
		echo "<br>";

		//Variable de la sesión
		session_start();
		// $_SESSION["usuario"]=$_POST["usuario"];
		echo "<h3>Hola " . $_SESSION['usuario'] . "</h3>";
	
?>
	

	<form action="formulario_recursos.proc.php" name="for2" method="POST">
		Nombre del recurso:
		<select name="tipo_recurso">
	        <?php
	          $query = $link -> query ("SELECT * FROM tbl_recurso");
	          while ($valores = mysqli_fetch_array($query)) {
	            echo '<option value="'.$valores[nombre_recurso].'">'.$valores[nombre_recurso].'</option>';
	          }
	        ?>
     	</select><br>
		Hora inicial:
		<input type="time" name="hora_inicial"><br>
		Hora final:
		<input type="time" name="hora_final"><br>
		Día:
		<input type="date" name="dia"><br><br>

		<input type="submit" name="confirmar" value="confirmar">
		<input type="button" value="Volver al login" onclick="window.location.href='login.proc.php'" />
		
	</form>

	<h3>Reservas ya hechas</h3>
	<?php
		$query = mysqli_query($link, "SELECT * FROM tbl_reserva ORDER BY id_reserva, nombre_recurso, horainicio_reserva, horasalida_reserva, dia_reserva");
		while($recursos = mysqli_fetch_array($query)){
		echo "Recurso: $recursos[id_reserva], Nombre: $recursos[nombre_recurso], Hora Inicio: $recursos[horainicio_reserva] ,Hora Final: $recursos[horasalida_reserva], Día reserva: $recursos[dia_reserva]<br>";
	}
	?>
	<br>
	<form>
		<input type="button" value="Eliminar reserva" onclick="window.location.href='eliminar_recursos.php'" />
	</form>
</body>
</html>
