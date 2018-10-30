<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Recurso</title>
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
		// $query = mysqli_connect("SELECT id_reserva, id_reserva FROM tbl_reserva ORDER BY id_reserva ASC");
		// $resultado = $mysqli_query ($query);
		
		?>
		<form action="formulario_recursos.proc.php" name="for2" method="POST">
			Número del recurso que vas a borrar:
			<select name="tipo_recurso">
	        <?php
	          $query = $link -> query ("SELECT * FROM tbl_recurso");
	          while ($valores = mysqli_fetch_array($query)) {
	            echo '<option value="'.$valores[nombre_recurso].'">'.$valores[nombre_recurso].'</option>';
	          }
	        ?>
     	</select><br>
			<input type="submit" name="eliminar" value="Eliminar">
			<input type="button" value="Volver a los recursos" onclick="window.location.href='formulario_recursos.php'" />
			
		</form>
	</body>
</html>