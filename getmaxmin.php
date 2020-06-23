<?php
    include ('db.php');
    $mysqli = ConectarDB();

    $sql="SELECT * FROM configuracion ORDER BY ID LIMIT 1";
    $resultado = $mysqli->query($sql); 
    $row = $resultado->fetch_assoc();        
    echo  str_pad($row['PL1'], 4, "0", STR_PAD_LEFT).str_pad($row['PL1MIN'], 4, "0", STR_PAD_LEFT);
 

	mysqli_close($mysqli);
?>