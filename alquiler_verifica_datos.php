<DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Alquiler</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
    body {
        background-image: url(imagenes/fondo.png);
        display: flex;
        justify-content: center;
        align-items: center;
        }
    .container {
        display: flex;
        align-items: center;
        justify-content: center
        width: 100%;
        margin-top: -10px;
        }
    .desarrolladores{
        position: fixed;
        bottom:0;
        right: 0;
        margin:20px;
        }

    button {
        background-color: transparent;
        padding: 10px;
        border: none;
        border-radius: 100px;
        cursor: pointer;
        }
    .texto-rojo {
        color: red;
        font-weight: bold;
        }
    .boton-registrar{
        background-color: #277b33;
        color:white;
        padding: 10px;
        height: 40px;
        width: 130px;
        border-radius: 10px;
    }
    .boton-registrar:hover{
        background-color: #055511;
        font-weight: bold;
        box-shadow: -10px 10px 95px 0px rgba(4,97,46,1);
    }
    .boton-cancelar{
        background-color: #f86060;
        color:white;
        padding: 10px;
        height: 40px;
        width: 130px;
        border-radius: 10px;
    }
    .boton-cancelar:hover{
        background-color: red;
        font-weight: bold;
        box-shadow: -10px 10px 95px 0px rgba(4,97,46,1);
    }
</style>
<body>
    <div id="reloj" class="reloj">00:00:00</div>
    <div class="container">
       <a href="lozas.html"><img src="imagenes/regresar.gif" width="35px" height="35px" alt="Cambiar de Loza Deportiva"></a>
        <?php
            date_default_timezone_set('America/Lima'); 
            $lozaElegida = isset($_GET['loza']) ? $_GET['loza'] : '';
            if (isset($_GET['loza'])) {
                $lozaElegida = $_GET['loza'];
                if ($lozaElegida=='A' || $lozaElegida=='B' ){
                    echo "<h1>Loza Seleccionada: </h1>";
                    echo "<div id='miId'>$lozaElegida</div>";
                }
                else{
                    header('Location: lozas.html');
                }
            } else {
                header('Location: lozas.html');
            }
        ?>

    </div>
        Seleccione Fecha: <input type="date" name="fechajuego" required placeholder="Fecha" id="fechajuego" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>"><br><br>
        <center>
        <table id="tabla-turnos">
            <tr id="turno1">
                <td>Turno 1</td>
                <td>06:00am 07:00am</td>
                <td><button id="botonTurno1" onclick='openModal("06:00am 07:00am", 1)'>Seleccionar</button></td>
            </tr>
            <tr id="turno2">
                <td>Turno 2</td>
                <td>07:00am 08:00am</td>
                <td><button id="botonTurno2" onclick='openModal("07:00am 08:00am",2)'>Seleccionar</button></td>
            </tr>
            <tr id="turno3">
                <td>Turno 3</td>
                <td>08:00am 09:00am</td>
                <td><button id="botonTurno3" onclick='openModal("08:00am 09:00am",3)'>Seleccionar</button></td>
            </tr>
            <tr id="turno4">
                <td>Turno 4</td>
                <td>09:00am 10:00am</td>
                <td><button id="botonTurno4" onclick='openModal("09:00am 10:00am",4)'>Seleccionar</button></td>
            </tr>
            <tr id="turno5">
                <td>Turno 5</td>
                <td>10:00am 11:00am</td>
                <td><button id="botonTurno5" onclick='openModal("10:00am 11:00am",5)'>Seleccionar</button></td>
            </tr>
            <tr id="turno6">
                <td>Turno 6</td>
                <td>11:00am 12:00m</td>
                <td><button id="botonTurno6" onclick='openModal("11:00am 12:00m",6)'>Seleccionar</button></td>
            </tr>
            <tr id="turno7">
                <td>Turno 7</td>
                <td>12:00m 01:00pm</td>
                <td><button id="botonTurno7" onclick='openModal("12:00m 01:00pm",7)'>Seleccionar</button></td>
            </tr>
            <tr id="turno8">
                <td>Turno 8</td>
                <td>01:00pm 02:00pm</td>
                <td><button id="botonTurno8" onclick='openModal("01:00pm 02:00pm",8)'>Seleccionar</button></td>
            </tr>
            <tr id="turno9">
                <td>Turno 9</td>
                <td>02:00pm 03:00pm</td>
                <td><button id="botonTurno9" onclick='openModal("02:00pm 03:00pm",9)'>Seleccionar</button></td>
            </tr>
            <tr id="turno10">
                <td>Turno 10</td>
                <td>03:00pm 04:00pm</td>
                <td><button id="botonTurno10" onclick='openModal("03:00pm 04:00pm",10)'>Seleccionar</button></td>
            </tr>
            <tr id="turno11">
                <td>Turno 11</td>
                <td>04:00pm 05:00pm</td>
                <td><button id="botonTurno11" onclick='openModal("04:00pm 05:00pm",11)'>Seleccionar</button></td>
            </tr>
            <tr id="turno12">
                <td>Turno 12</td>
                <td>05:00pm 06:00pm</td>
                <td><button id="botonTurno12" onclick='openModal("05:00pm 06:00pm",12)'>Seleccionar</button></td>
            </tr>
            <tr id="turno13">
                <td>Turno 13</td>
                <td>06:00am 07:00pm</td>
                <td><button id="botonTurno13" onclick='openModal("06:00am 07:00pm",13)'>Seleccionar</button></td>
            </tr>
            <tr id="turno14">
                <td>Turno 14</td>
                <td>07:00pm 08:00pm</td>
                <td><button id="botonTurno14" onclick='openModal("07:00pm 08:00pm",14)'>Seleccionar</button></td>
            </tr>
            <tr id="turno15">
                <td>Turno 15</td>
                <td>08:00pm 09:00pm</td>
                <td><button id="botonTurno15" onclick='openModal("08:00pm 09:00pm",15)'>Seleccionar</button></td>
            </tr>
            <tr id="turno16">
                <td>Turno 16</td>
                <td>10:00pm 11:00pm</td>
                <td><button id="botonTurno16" onclick='openModal("10:00pm 11:00pm",16)'>Seleccionar</button></td>
            </tr>
            <tr id="turno17">
                <td>Turno 17</td>
                <td>11:00pm 12:00pm</td>
                <td><button id="botonTurno17" onclick='openModal("11:00pm 12:00pm",17)'>Seleccionar</button></td>
            </tr>
            <tr id="turno18">
                <td>Turno 18</td>
                <td>12:00pm 01:00am</td>
                <td><button id="botonTurno18" onclick='openModal("12:00pm 01:00am",18)'>Seleccionar</button></td>
            </tr>
        </table> 
        </center>
     
        <div class="desarrolladores">
            <button type="button">
                <img src="imagenes/desarrolladores.png" width="50px" height="50px" alt="Desarrolladores" onclick="irAAutores()" >
            </button>
        </div>
              
    <div id="myModal" class="modal">
        <div class="modal-content">
            <br>
            <center>
               <span id="lozaElegida"></span>
                <h2>Loza Deportiva: <?php echo $lozaElegida; ?></h2>
            </center>
            <div class="dato_alquiler">
                Fecha: <span id="fechaModal"></span><br>
                Turno Nro: <span id="turnoModal"></span> de <span id="detalleturnoModal"></span>
            </div>
            <div class="contenedor-elementos">
            <img src="imagenes/documento.png" width="40px">
            <input type="number" placeholder="DNI" id="dni" name="dni" oninput="validarDNI(); buscarCliente()" required>
            <span id="mensajeDNI" style="color: red;font-size:small;"></span>
            </div>
            <div class="contenedor-elementos">
            <img src="imagenes/usuario.png" width="30px">
            <input type="text" placeholder="Nombre" id="nombre" required>
            </div>
            <div class="contenedor-elementos">
            <img src="imagenes/correo.png" width="30px">
            <input type="email" placeholder="Correo" id="correo" oninput="validarCorreo();" required>
            <span id="mensajeCorreo" style="color: red; font-size: small;"></span>
            </div>
            <div class="contenedor-elementos">
            <img src="imagenes/celular.png" width="30px">
            <input type="number" placeholder="Número de Celular" id="celular" name="celular" oninput="validarCelular()" required>
            <span id="mensajeCelular" style="color: red; font-size: small;"></span><br>
            </div>
            <button class="boton-registrar" onclick="registrarFormulario()">Guardar</button>
            <button class="boton-cancelar" onclick="closeModal()">Cancelar</button><br>        
            <div class="tiempo_restante">
                <p>Tiempo Restante: <span id="countdown"></span></p>    
            </div>
        </div>
    </div>
    <script>
        var modal = document.getElementById("myModal");
        var countdownElement = document.getElementById("countdown");
        var countdownTime = 5 * 60; // 5 minutos en segundos
        var countdownInterval;

        // **************** Funciones *******************
        function openModal(turno, numeroturno) {
            var fechaSeleccionada = document.getElementById('fechajuego').value;
            document.getElementById('dni').value = "";
            document.getElementById('nombre').value = "";
            document.getElementById('correo').value = "";
            document.getElementById('celular').value = "";
            document.getElementById('fechaModal').innerText = fechaSeleccionada;
            document.getElementById('turnoModal').innerText = numeroturno;
            document.getElementById('detalleturnoModal').innerText = turno;
            modal.style.display = "block";
            startCountdown();
            return false;
        }
        function actualizarReloj() {
            const reloj = document.getElementById('reloj');
            const horaActual = new Date();
            const hora = horaActual.getHours().toString().padStart(2, '0');
            const minutos = horaActual.getMinutes().toString().padStart(2, '0');
            const segundos = horaActual.getSeconds().toString().padStart(2, '0');
            const horaFormateada = `${hora}:${minutos}:${segundos}`;
            reloj.textContent = horaFormateada;
        }
        setInterval(actualizarReloj, 1000);
        actualizarReloj();
        
        function startCountdown() {
            updateCountdown();
            countdownInterval = setInterval(function () {
                countdownTime--;
                updateCountdown();
                if (countdownTime <= 0) {
                    closeModal();
                }
            }, 1000);
        }

        function updateCountdown() {
            var minutes = Math.floor(countdownTime / 60);
            var seconds = countdownTime % 60;
            countdownElement.textContent = minutes + "m " + seconds + "s";
        }

        function closeModal() {
            modal.style.display = "none";
            clearInterval(countdownInterval);
            countdownTime = 5 * 60; // Reiniciar el tiempo al cerrar el modal
        }
        
        function irAAutores() {
            var nombreArchivoActual = 'lozas.html';
            window.location.href = 'autores.html?anterior=' + nombreArchivoActual;
        }

        // Buscar cliente en Base de Datos
        function buscarCliente() {
            var dni = document.getElementById("dni").value;
            //console.log("DNI: "+dni);
            fetch('buscar_cliente.php?dni=' + dni)
                .then(response => response.json())
                .then(data => {
                    // Llenar los campos con los datos del cliente si existe
                    if (data.exists) {
                        document.getElementById("nombre").value = data.nombre;
                        document.getElementById("correo").value = data.correo;
                        document.getElementById("celular").value = data.celular;
                        //console.log("Encontrado");
                    } else {
                        // Limpiar los campos si el cliente no existe
                        document.getElementById("nombre").value = "";
                        document.getElementById("correo").value = "";
                        document.getElementById("celular").value = "";
                        //console.log("No Existe");
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function validarDNI() {
            var dniInput = document.getElementById("dni");
            var mensajeDNI = document.getElementById("mensajeDNI");
            if (dniInput.value.length !== 8) {
                mensajeDNI.textContent = "El DNI debe tener 8 dígitos.";
            } else {
                mensajeDNI.textContent = "";
            }
        }
        
        function validarCorreo() {
            var correo = document.getElementById("correo").value;
            var mensajeCorreo = document.getElementById("mensajeCorreo");

            // Expresión regular para validar un correo electrónico
            var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (correo === "" || !regexCorreo.test(correo)) {
                mensajeCorreo.textContent = "Correo electrónico incorrecto";
                return false;
            } else {
                mensajeCorreo.textContent = ""; // Limpiar el mensaje de error si es válido
                return true;
            }
        }
        
        function validarCelular() {
            var celular = document.getElementById("celular");
            var mensajeCelular = document.getElementById("mensajeCelular");
            if (celular.value.length !== 9) {
                mensajeCelular.textContent = "El Celular debe tener 9 dígitos.";
            } else {
            }
        }
        
        function registrarFormulario() {
            var dni = document.getElementById("dni").value;
            var nombre = document.getElementById("nombre").value;
            var correo = document.getElementById("correo").value;
            var celular = document.getElementById("celular").value;
            var ff = document.getElementById("fechaModal").textContent; 
            var tt = document.getElementById("turnoModal").textContent; 
            var lo = document.getElementById("miId").textContent;
            console.log("Loza Elegida: ",lo);
            var confirmacion = window.confirm("¿Deseas guardar el registro?");
            if (confirmacion) {
                $.ajax({
                    type: "POST",
                    url: "guardar_cliente.php",
                    data: {
                        dni: dni,
                        nombre: nombre,
                        correo: correo,
                        celular: celular,
                        fechaModal: ff,
                        turnoModal: tt,
                        loza: lo
                    },
                    success: function (response) {
                        console.log(response);
                        buscarCliente();
                        obtenerTurnosReservados();
                    },
                    error: function (error) {
                        console.error("Error al enviar la solicitud AJAX: " + error);
                    }
                });
                closeModal();
            } else {
                // Limpiar los datos si el usuario elige no guardar
                document.getElementById("dni").value = "";
                document.getElementById("nombre").value = "";
                document.getElementById("correo").value = "";
                document.getElementById("celular").value = "";
            }
        }
        
        //************** Bloquear Turnos reservados **************
        $(document).ready(function () {
            obtenerTurnosReservados();
            $("#fechajuego").on("change", function () {
                // Ejecutar al cambiar la fecha
                obtenerTurnosReservados();
            });
        });

        function obtenerTurnosReservados() {
            var fechaSeleccionada = $("#fechajuego").val();
            var lozaSeleccionada = "<?php echo htmlspecialchars($lozaElegida, ENT_QUOTES, 'UTF-8'); ?>";
            $.ajax({
                type: "POST",
                url: "obtener_turnos_reservados.php",
                data: { fecha: fechaSeleccionada, loza: lozaSeleccionada },
                success: function (data) {
                    var turnosReservados = JSON.parse(data);
                    for (var i = 1; i <= 18; i++) {
                        var botonId = 'botonTurno' + i;
                        if (turnosReservados.includes(i.toString())) {
                            $('#' + botonId).prop('disabled', true);
                            //$('#' + botonId).text('Alquilado');
                            $('#' + botonId).text('Alquilado').addClass('texto-rojo');
                        } else {
                            $('#' + botonId).prop('disabled', false);
                            $('#' + botonId).text('Seleccionar');
                            $('#' + botonId).removeClass('texto-rojo');
                        }
                    }
                },
                error: function () {
                    console.error("Error al obtener los turnos reservados");
                }
            });
        }        
    </script>
</body>
</html>