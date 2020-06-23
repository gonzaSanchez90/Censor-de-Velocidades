<?php
    // iot.php
    // Importamos la configuración
    include("db.php");
    $mysqli = ConectarDB();
    // Leemos los valores que nos llegan por GET
    $valor = mysqli_real_escape_string($mysqli, $_GET['valor']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO valores1(Primario) VALUES('".$valor."')";
    // Ejecutamos la instrucción
    mysqli_query($mysqli, $query);
    mysqli_close($mysqli);
?>