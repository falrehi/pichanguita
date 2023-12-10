<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdloza";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener valores del formulario
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];

// Realizar las consultas para cada loza
$sql_loza_A = "SELECT COUNT(*) as total_alquileres_A, COUNT(*) * 5 as total_recaudado_A
               FROM alquiler
               WHERE alq_fecha BETWEEN '$fechaInicio' AND '$fechaFin'
               AND alq_loza = 'A'";

$sql_loza_B = "SELECT COUNT(*) as total_alquileres_B, COUNT(*) * 5 as total_recaudado_B
               FROM alquiler
               WHERE alq_fecha BETWEEN '$fechaInicio' AND '$fechaFin'
               AND alq_loza = 'B'";

$result_loza_A = $conn->query($sql_loza_A);
$result_loza_B = $conn->query($sql_loza_B);

// Inicializar el array para el resultado
$respuesta = array(
    'total_alquileres_A' => 0,
    'total_recaudado_A' => 0,
    'total_alquileres_B' => 0,
    'total_recaudado_B' => 0
);

// Procesar los resultados de la consulta para Loza A
if ($row_A = $result_loza_A->fetch_assoc()) {
    $respuesta['total_alquileres_A'] = $row_A['total_alquileres_A'];
    $respuesta['total_recaudado_A'] = $row_A['total_recaudado_A'];
}

// Procesar los resultados de la consulta para Loza B
if ($row_B = $result_loza_B->fetch_assoc()) {
    $respuesta['total_alquileres_B'] = $row_B['total_alquileres_B'];
    $respuesta['total_recaudado_B'] = $row_B['total_recaudado_B'];
}

// Devolver la respuesta como JSON
echo json_encode($respuesta);

// Cerrar la conexión
$conn->close();
?>
