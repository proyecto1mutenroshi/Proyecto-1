<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
	<title> Main Page </title>
=======
	<title></title>
>>>>>>> fb142f7839c6385f44aef0023c7f4fdbd92a61d7
</head>
<body>
<?php
session_start();
echo "Hola " . $_SESSION['usuario'];
?>
<<<<<<< HEAD
<form action="formulario_recursos.proc.php" name="for2" method="POST">
=======
<form action="recurso.proc.php" name="for1" method="POST" onsubmit="return buscar();">
>>>>>>> fb142f7839c6385f44aef0023c7f4fdbd92a61d7
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
