<?php
	$link = mysqli_connect('localhost', 'root', '', '1819_exemple');
			
			if (!$link) {
			    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
			    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
			    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
	$query = mysqli_query($link, "SELECT login (User,Contrasenya) FROM )";
	echo "<a href='index.html'> Volver</a>";