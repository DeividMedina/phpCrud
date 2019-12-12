<html>
<head>
	<title>Adicionar Registro</title>
	<style>
	body{
		background: #085078;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #85D8CE, #085078);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #85D8CE, #085078); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Nombre = mysqli_real_escape_string($mysqli, $_POST['name']);
	$Edad = mysqli_real_escape_string($mysqli, $_POST['age']);
	$Correo = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	if(empty($Nombre) || empty($Edad) || empty($Correo)) {
		if(empty($Nombre)) {
			echo "<font color='red'>Nombre esta vacio.</font><br/>";
		}
		if(empty($Edad)) {
			echo "<font color='red'>Edad esta vacio.</font><br/>";
		}
		if(empty($Correo)) {
			echo "<font color='red'>Correo esta vacio.</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$Nombre','$Edad','$Correo')");
		echo "<font color='green'>Su registro está guardadp";
		echo "<br/><a href='index.php'>Volver al inicio</a>";
	}
}
?>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
