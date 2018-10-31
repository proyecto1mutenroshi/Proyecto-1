<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./style/estilos.css"/>
	<link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">
</head>
<body>
	<div id="form">
		<form action="login.proc.php" name="for1" method="POST">
			<p>Nombre de usuario:</p>
			<input type="text" name="user" placeholder="N. Usuario"><br><br>
			<p>Contraseña:</p>
			<input type="text" name="contrasenya" placeholder="Contraseña"><br><br>
			<!-- <button id="enviar" type="submit" onclick="cifrar()">Confirmar</button> -->
			<input type="submit" name="confirmar" onclick="cifrar()" value="Confirmar">
		</form>
	</div>
	<script src="js.js"></script>
</body>
</html>