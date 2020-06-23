<?php
    // iot.php
    // Importamos la configuración
    include("db.php");
    $mysqli = ConectarDB();
    // Leemos los valores que nos llegan por GET
    $valor = mysqli_real_escape_string($mysqli, $_GET['valor']);
    //$valor1=$valor+rand(0, 100);
    //$valor2=$valor+rand(0, 100);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO valores(Primario) VALUES('".$valor."')";
    mysqli_query($mysqli, $query);
    //$query = "INSERT INTO valores1(Primario) VALUES('".$valor1."')";
    //mysqli_query($mysqli, $query);
    //$query = "INSERT INTO valores2(Primario) VALUES('".$valor2."')";
    // Ejecutamos la instrucción
    //mysqli_query($mysqli, $query);
    mysqli_close($mysqli);

?>