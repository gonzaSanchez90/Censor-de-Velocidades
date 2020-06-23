<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport">
	<title>Sistema de velocidades</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

	<?php 
		include('db.php');
		$mysqli = ConectarDB();
		$sql = "SELECT * FROM valores";
		$resultado = $mysqli->query($sql);
	?>	
	
</head>
<body>
	<div>

		<table border="4" class="table-striped">
			<tr border>
				<td>Fecha / Hora</td>
				<td>Valor</td>
			</tr>

				<?php   
				while ($fila = $resultado->fetch_assoc()) {
					?>
					<tr>
					<td>	<?php echo $fila['tiempo']; ?></td>
					<td>	<?php echo $fila['valor']; ?></td>
					</tr>
				<?php	
				}
				?>

		</table>
	</div>	
	<a href="inicio.php"><input type="button" value="Volver"></a>
	<a href="graficar.php"><input type="button" value="Mostrar Gráfico"></a>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>