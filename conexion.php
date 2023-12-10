<?php
	$host = "localhost";
    $usuario="root";
    $bd="bddeporte";
    $pass="";
    $mysqli = mysqli_connect($host,$usuario,$pass,$bd);
    $conn = $mysqli;
    if (!$mysqli){
        echo "Error conectando a la base de datos.";
        die("Conexión Fallida: " . mysqli_connect_error());
        exit();
    }
    mysqli_set_charset($mysqli, "utf8");
?>