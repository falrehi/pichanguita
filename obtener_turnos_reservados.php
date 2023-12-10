<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdloza";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
$fechaSeleccionada = $_POST['fecha'];
$lozaSeleccionada = isset($_POST['loza']) ? $_POST['loza'] : '';
$sql = "SELECT alq_turno FROM alquiler WHERE alq_fecha = '$fechaSeleccionada' AND alq_loza = '$lozaSeleccionada'";
$result = $conn->query($sql);
if ($result) {
    $turnosReservados = array();
    while ($fila = $result->fetch_assoc()) {
        $turnosReservados[] = $fila['alq_turno'];
    }
    echo json_encode($turnosReservados);
    exit();
} else {
    echo "Error en la consulta: " . $conn->error;
}
$conn->close();
?>
