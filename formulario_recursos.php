<!DOCTYPE html>
<html>
<head>

	<title> Página Principal</title>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./style/estilos.css"/>
	<link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">
</head>
<body>
	<header>
		<h1 id="titulo">Reserva de Material</h1>
	</header>
	<div id="general">
		<h3 style="text-align: center; padding-top: 10px; font-family: 'Charmonman', cursive;">Bienvenido</h3>
	<div id="formulario">
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
		echo "<h3>Haz tu reserva" . "</h3>";
	
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
		<input type="hidden" name="idusuario" value='<?php echo $_SESSION['idusuario']?>' >
		<input type="submit" name="confirmar" value="Confirmar">
		<input type="button" value="Volver al login" onclick="window.location.href='index.php'" />
		
	</form>
</div>
<div id="reservas">
	<h3>Reservas</h3>
	<table border="1px">
				<tr>
					<th>Reserva</th>
					<th>Nombre Recurso</th>
					<th>Hora Inicio</th>
					<th>Hora Final</th>
					<th>Día Reserva</th>
				</tr>
	<?php

		$query = mysqli_query($link, "SELECT * FROM tbl_reserva ORDER BY id_reserva, nombre_recurso, horainicio_reserva, horasalida_reserva, dia_reserva");
		while($recursos = mysqli_fetch_array($query)){
	?>
			
				<tr>
					<td><?php echo "$recursos[id_reserva]"?></td>
					<td><?php echo "$recursos[nombre_recurso]"?></td>
					<td><?php echo "$recursos[horainicio_reserva]"?></td>
					<td><?php echo "$recursos[horasalida_reserva]"?></td>
					<td><?php echo "$recursos[dia_reserva]"?></td>
				</tr>
			
		<!-- echo "Recurso: $recursos[id_reserva], Nombre: $recursos[nombre_recurso], Hora Inicio: $recursos[horainicio_reserva] ,Hora Final: $recursos[horasalida_reserva], Día reserva: $recursos[dia_reserva]<br>"; -->
		<?php
		}
		?>
		</table>
	<br>
	<form>
		<input type="button" value="Eliminar Reserva" onclick="window.location.href='eliminar_recursos.php'" />
	</form>
</div>																															
</div>
</body>
</html>
