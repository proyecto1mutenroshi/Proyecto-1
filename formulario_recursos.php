<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
echo "Hola " . $_SESSION['usuario'];
?>
<form action="recurso.proc.php" name="for1" method="POST" onsubmit="return buscar();">
		nombre del recurso:
		<input type="text" name="tipo_recurso"><br>
		tipo de recurso:
		<input type="select" name="nombre_recurso"><br>
		Hora inicial:
		<input type="time" name="hora_inicial"><br>
		Hora final:
		<input type="time" name="hora_final"><br>
		día:
		<input type="date" name="dia"><br>
		<input type="submit" name="confirmar" value="confirmar">
</form>
</body>
</html>
