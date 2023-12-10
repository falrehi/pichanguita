<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdloza";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$ff = $_POST['fechaModal'];
$tt = $_POST['turnoModal'];
$lo = $_POST['loza'];
    // Imprime los datos en la consola
echo "Datos recibidos: dni=$dni, nombre=$nombre, correo=$correo, celular=$celular, fechaModal=$ff, turnoModal=$tt, lozaElegida=$lo";

$sql_verificar = "SELECT * FROM cliente WHERE cli_dni = '$dni'";
$result_verificar = $conn->query($sql_verificar);

if ($result_verificar->num_rows > 0) {
    // Cliente ya existe, obtener cli_id
    $row = $result_verificar->fetch_assoc();
    $id = $row['cli_id'];

    // Guardar información de alquiler en la tabla Alquiler
    $sql_insertar_alquiler = "INSERT INTO alquiler (cli_id, alq_loza, alq_fecha, alq_turno, alq_pago, alq_estado) 
                              VALUES ('$id', '$lo', '$ff', '$tt', '1', '1')";
    if ($conn->query($sql_insertar_alquiler) === TRUE) {
        $mensajeCorreo = "Alquiler de Lozas 'El Mundialito'\n";
        $mensajeCorreo .= "Fecha Reservada: $ff\n";
        $mensajeCorreo .= "Turno: $tt\n";
        $mensajeCorreo .= "Loza: $lo\n";

        // Asunto del correo
        $asunto = "Confirmación de Alquiler - Lozas 'El Mundialito'";

        // Headers del correo
        $headers = "From: alexdaroalva@gmail.com"; // Reemplaza con tu dirección de correo

        // Enviar el correo
        mail($correo, $asunto, $mensajeCorreo, $headers);
        //****************************
        echo "Cliente existente. Datos de alquiler registrados correctamente.";
    } else {
        echo "Error al registrar los datos de alquiler: " . $conn->error;
    }
} else {
    // Cliente no existe, primero guardarlo en la tabla Cliente
    $sql_insertar_cliente = "INSERT INTO cliente (cli_dni, cli_nombres, cli_correo, cli_fono) 
                            VALUES ('$dni', '$nombre', '$correo', '$celular')";

    if ($conn->query($sql_insertar_cliente) === TRUE) {
        // Obtener el cli_id recién insertado
        $id = $conn->insert_id;

        // Guardar información de alquiler en la tabla Alquiler
        $sql_insertar_alquiler = "INSERT INTO alquiler (cli_id, alq_loza, alq_fecha, alq_turno, alq_pago, alq_estado) 
                                  VALUES ('$id', '$lo', '$ff', '$tt', '1', '1')";
        if ($conn->query($sql_insertar_alquiler) === TRUE) {
            $mensajeCorreo = "Alquiler de Lozas 'El Mundialito'\n";
            $mensajeCorreo .= "Fecha Reservada: $ff\n";
            $mensajeCorreo .= "Turno: $tt\n";
            $mensajeCorreo .= "Loza: $lo\n";

            // Asunto del correo
            $asunto = "Confirmación de Alquiler - Lozas 'El Mundialito'";

            // Headers del correo
            $headers = "From: alexdaroalva@gmail.com"; // Reemplaza con tu dirección de correo

            // Enviar el correo
            mail($correo, $asunto, $mensajeCorreo, $headers);
            //*********************
            echo "Cliente nuevo registrado. Datos de alquiler registrados correctamente.";
            
        } else {
            echo "Error al registrar los datos de alquiler: " . $conn->error;
        }
    } else {
        echo "Error al registrar el cliente: " . $conn->error;
    }
}

$conn->close();
?>


