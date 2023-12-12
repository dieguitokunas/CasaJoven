<?php
require './db/conexion.php';

session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totem || Casa Joven Diego Armando Maradona || Administrador</title>
    <link rel="stylesheet" href="estilos/totem.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/825e76f8f3.js" crossorigin="anonymous"></script>


</head>

<body class="bg-warning">
    <header>
        <div class="logo">
            <img src="img/logo4.png" alt="">
        </div>
    </header>
    <form action="db/totem_insertar.php" method="post">
        <div class="primer-form" id="primer-form">
            <center>
                <h2 class="text-light">Ingrese sus datos</h2>
            </center>
            <select name="tipo_identificacion" class="bg-light" id="tipo_identificacion" required>
                <option value="">Seleccione su tipo de identificacion</option>
                <?php
                $tipoIden = $con->query("SELECT tipo_identificacion FROM tipo_identificacion");
                while ($row = $tipoIden->fetch_assoc()) {
                    echo '<option value="' . $row["tipo_identificacion"] . '">' . $row['tipo_identificacion'] . '</option>';
                }
                ?>
            </select>
            <input type="text" name="numero_identificacion" id="num_identificacion" autocomplete="off" required>
            <input type="text" name="nombre" placeholder="Ingrese su nombre" id="nombre" autocomplete="off" required>
            <input type="text" name="apellido" placeholder="Ingrese su apellido" id="apellido" autocomplete="off" required>
            <div class="fecha">
                <label for="fecha">Ingrese su fecha de nacimiento</label>
                <input type="date" name="fecha" id="fecha" required>
            </div>
            <select name="sexo" id="sexo">
                <option value="">Seleccione su sexo</option>

                <?php
                $sexo = $con->query("SELECT sexo FROM sexos");
                while ($row = $sexo->fetch_assoc()) {
                    echo '<option value="' . $row['sexo'] . '">' . $row['sexo'] . '</option>';
                }
                ?>


            </select>
            <select name="nacionalidad" id="nacionalidad">
                <option value="">Seleccione su nacionalidad</option>
                <?php
                $nacionalidad = $con->query('SELECT nacionalidad FROM nacionalidad');
                while ($row = $nacionalidad->fetch_assoc()) {
                    echo '<option value="' . $row['nacionalidad'] . '">' . $row['nacionalidad'] . '</option>';
                }

                ?>
            </select>

            <button id="continuar">Continuar</button>


            <div class="ir-login">
                <p>Si ya ha registrado una solicitud anteriormente,<a href="" id="mostrarSoloConsulta"> ingrese aqui
                    </a></p>
                <?php
                if (isset($_SESSION['id']) && $_SESSION['id'] == "casajoven") {
                    echo '<a href="index.php">Ir al panel de control</a>';
                }
                ?>
            </div>
        </div>
        <div class="segundo-form" id="segundo-form">
            <center>
                <h2 class="text-light">Ingrese su consulta</h2>
            </center>
            <select name="consulta" id="consulta">
                <option value="">Seleccione su consulta</option>
                <?php
                    $consulta = $con->query("SELECT consultas FROM lista_consultas");
                    while ($row = $consulta->fetch_assoc()) {
                        echo '<option value="' . $row['consultas'] . '">' . $row['consultas'] . '</option>';
                    }

                ?>


            </select>
            <label for="otra_consulta">Si tiene otra consulta, ingresela aquí</label>
            <input type="text" name="otra_consulta" placeholder="Otra consulta" autocomplete="off" id="otra-cons">
            <div class="volver">
                <button class="fa-solid fa-arrow-left" id="volver"></button>
                <input type="submit" value="Registrar solicitud" id="EnviarRegistro" name="enviarPersona">
            </div>
        </div>


        <div class="consultas-form" id="consultas-form">
            <center>
                <h2 class="text-light">Ingrese su consulta</h2>
            </center>
            <input type="text" name="numero_identificacionConsulta" autocomplete="off" placeholder="Ingrese su DNI o Pasaporte" id="numero_identificacionConsulta">
            <select name="consultaConsulta" id="consultaConsulta">
                <option value="">Seleccione su consulta</option>
                <?php
                    $consultaConsulta = $con->query('SELECT consultas FROM lista_consultas');
                    while ($row = $consultaConsulta->fetch_assoc()) {
                        echo '<option value="' . $row['consultas'] . '">' . $row['consultas'] . '</option>';
                    }

                ?>
            </select>
            <label for="otra_consulta">Si tiene otra consulta, ingresela aquí</label>
            <input type="text" name="otra_consultaConsulta" autocomplete="off" placeholder="Otra consulta" id="otraConsultaConsulta">
            <div class="volver">
                <button class="fa-solid fa-arrow-left" id="volver-a-personas"></button>
                <input type="submit" value="Registrar solicitud" name="enviarSoloConsulta" id="enviarSoloConsulta">
            </div>
        </div>
    </form>
    <script src="includes/totem.js">

    </script>
</body>

</html>
                