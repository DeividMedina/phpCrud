<?php
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
	} else {	
		$result = mysqli_query($mysqli, "UPDATE users SET name='$Nombre',age='$Edad',email='$Correo' WHERE id=$id");
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$Nombre = $res['name'];
	$Edad = $res['age'];
	$Correo = $res['email'];
}
?>
<html>
<head>	
	<title>Editar Datos</title>
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
	<a href="index.php" class="btn btn-primary">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre</td>
				<td><input type="text" name="name" value="<?php echo $Nombre;?>"></td>
			</tr>
			<tr> 
				<td>Edad</td>
				<td><input type="text" name="age" value="<?php echo $Edad;?>"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="email" value="<?php echo $Correo;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" class="btn btn-secondary" value="Actualizar"></td>
			</tr>
		</table>
	</form>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>
