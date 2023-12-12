<?php
require 'conexion.php';
if (isset($_POST["editar"])) {
    $id = $_POST["id_persona"];
    $tipo_identificacion = $_POST["tipo_identificacion"];
    $numero_identificacionEditar = $_POST["numero_identificacionEditar"];
    $nuevo_numero_identificacion = $_POST["numero_identificacionEditar"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha = $_POST["fecha"];
    $sexo = $_POST["sexo"];
    $nacionalidad = $_POST["nacionalidad"];

    $con->begin_transaction();

    try {
        $actualizarPersonas = $con->prepare("UPDATE personas
    LEFT JOIN consulta ON personas.numero_identificacion = consulta.numero_identificacion
    SET personas.tipo_identificacion = ?, personas.numero_identificacion = ?, personas.nombre = ?, personas.apellido = ?, personas.sexo = ?, personas.fecha_nacimiento = ?, personas.nacionalidad = ?, consulta.numero_identificacion = ?
    WHERE personas.id_persona = ?");
        $actualizarPersonas->bind_param("ssssssssi", $tipo_identificacion, $numero_identificacionEditar, $nombre, $apellido, $sexo, $fecha, $nacionalidad, $nuevo_numero_identificacion, $id);
        $actualizarPersonas->execute();




        $con->commit();

        header("location: ../index.php");
    } catch (Exception $e) {
        $con->rollback();
        echo "Error en la actualización: " . $e->getMessage();
    }
}
