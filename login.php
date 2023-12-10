<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdloza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM usuarios WHERE usu_nombres='$username' AND usu_clave='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;
        echo "success"; // Indicador de inicio de sesión exitoso
    } else {
        echo "error"; // Indicador de error en las credenciales
    }
}

$conn->close();
?>
