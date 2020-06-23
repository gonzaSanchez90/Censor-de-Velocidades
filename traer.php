<?php 

include ('db.php');
$mysqli = ConectarDB();

function traer($Id,$resultado1, $resultado2)
{
	if ($Id=!null)
	{
		$resultado1="SELECT valor1 FROM registro where id=$Id";
		$resultado2="SELECT valor1 FROM registro where id=$Id";
	}
}
?>