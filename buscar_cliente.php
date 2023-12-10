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
$dni = "";
$nombre = "";
$correo = "";
$celular = "";

// Obtener el DNI de la URL de manera segura
$dni = filter_input(INPUT_GET, 'dni', FILTER_SANITIZE_STRING);

// Imprimir el DNI en el registro de errores
error_log('DNI recibido: ' . $dni);

// Verificar si se proporcionó un DNI válido
if (!$dni) {
    // Devolver un mensaje de error en formato JSON
    $response = [
        'error' => 'DNI no válido'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit(); 
}

// Consulta  el DNI del cliente en la Base de Datos
$sql = "SELECT * FROM cliente WHERE cli_dni = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $dni);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si hubo un error en la consulta
if ($result === false) {
    // Devolver un mensaje de error en formato JSON si hay un problema con la consulta
    $response = [
        'error' => 'Error en la consulta SQL'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit(); // Salir del script después de enviar la respuesta
}

// Verificar si el DNI existe en la base de datos
if ($result->num_rows > 0) {
    // Si el DNI existe, devolver los datos del cliente
    $row = $result->fetch_assoc();
    $response = [
        'exists' => true,
        'nombre' => $row['cli_nombres'],
        'correo' => $row['cli_correo'],
        'celular' => $row['cli_fono']
    ];
} else {
    // Si el DNI no existe, indicarlo en la respuesta
    $response = [
        'exists' => false
    ];
}

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cerrar la conexión
$conn->close();
?>
