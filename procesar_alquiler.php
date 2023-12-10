<?php
// Conectar a la base de datos (asegúrate de tener tus credenciales configuradas)
$conexion = new mysqli("localhost", "root", "", "bdloza");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$cli_nombres = $_POST["cli_nombres"];
$cli_fono = $_POST["cli_fono"];
$alq_nrloza = $_POST["alq_nrloza"];
$alq_fecha = $_POST["alq_fecha"];
$alq_hora = $_POST["alq_hora"];
$alq_pago = isset($_POST["alq_pago"]) ? 1 : 0;
$alq_estado = isset($_POST["alq_estado"]) ? 1 : 0;

$sql_verificar = "SELECT * FROM alquiler WHERE alq_nrloza = '$alq_nrloza' AND alq_fecha = '$alq_fecha' AND alq_hora = '$alq_hora'";
$resultado = $conexion->query($sql_verificar);

if ($resultado->num_rows > 0) {
    // Si se encuentra un registro con los mismos valores, muestra un mensaje de error y no permitas la inserción.
    echo "Loza ya reservada para esta fecha y hora. Por favor, elige otra fecha u hora.";
} else {
    $sql_cliente = "INSERT INTO cliente (cli_nombres, cli_fono) VALUES ('$cli_nombres', '$cli_fono')";
    $conexion->query($sql_cliente);

    // Obtener el ID del cliente recién insertado
    $cli_id = $conexion->insert_id;

    // Realizar la inserción en la tabla "alquiler"
    $sql_alquiler = "INSERT INTO alquiler (cli_id, alq_nrloza, alq_fecha, alq_hora, alq_pago, alq_estado) VALUES ('$cli_id', '$alq_nrloza', '$alq_fecha', '$alq_hora', '$alq_pago', '1')";
}

// Cerrar la conexión
$conexion->close();

// Redirigir a una página de éxito o error
header("Location: alquiler.html");
?>
