<?php
require 'conexion.php';
if (isset($_GET["dni"])) {
    $dni = $_GET["dni"];
    $detalles = $con->query("SELECT * FROM personas WHERE personas.numero_identificacion = '$dni'");
    $row = $detalles->fetch_assoc();
    $consulta = $con->query("SELECT * FROM consulta INNER JOIN personas ON consulta.numero_identificacion=personas.numero_identificacion WHERE consulta.numero_identificacion = '$dni'");

    if ($row) {
        $contenido = '
        <i class="fa-solid fa-arrow-left" id="regresar" onclick="Regresar()"></i>
        <h2 class="text-light">Detalles de la persona</h2>
        <div class="table-cont bg-dark">
        <table class="table table-dark table-hover">
        <thead>
        <tr>
        <td>Identificacion</td>
        <td>Numero de Identificacion</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Fecha de nacimiento</td>
        <td>Sexo</td>
        <td>Nacionalidad</td>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>' . $row["tipo_identificacion"] . '</td>
        <td>' . $row["numero_identificacion"] . '</td>
        <td>' . $row["nombre"] . '</td>
        <td>' . $row["apellido"] . '</td>
        <td>' . $row["fecha_nacimiento"] . '</td>
        <td>' . $row["sexo"] . '</td>
        <td>' . $row["nacionalidad"] . '</td>
        </tr>
        </tbody>
        </table>
        ';
    } else {
        $contenido = '
        <i class="fa-solid fa-arrow-left" id="regresar" onclick="Regresar()"></i>
        <h2 class="text-light">Detalles de la persona</h2>
        <div class="table-cont bg-dark">
        <table class="table table-dark table-hover">
        <thead>
        <tr>
        <td>Identificacion</td>
        <td>Numero de Identificacion</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Fecha de nacimiento</td>
        <td>Sexo</td>
        <td>Nacionalidad</td>
        </tr>
        </thead>
        <tbody>
        <tr style="text-align:center;">
            <td colspan=7>No existe DNI o Pasaporte</td>
        </tr>
        </tbody>
        </table>       
        ';
    }


    if ($consulta) {
        $contenido .= '
        <h3 class="text-light">Historial de consultas de la persona</h3>
        <table class="table table-hover table-dark">
        <thead>
        <tr>
        <td>Consulta</td>
        <td>Otras consultas</td>
        <td>Fecha de registro</td>
        </tr>
        <thead>
        <tbody>';

        while ($rowConsulta = $consulta->fetch_assoc()) {
                $fecha=substr($rowConsulta["fecha_carga"],0,16);
            $contenido .= '            
            <tr>
                <td>' . $rowConsulta["consulta"] . '</td>
                <td>' . $rowConsulta["otra_consulta"] . '</td>
                <td>' . $fecha . '</td>
            </tr>
        ';
        }
        $contenido .= '
        
        </tr>
        </tbody>
        </table>
        </div>
        ';
    } else {
        $contenido .= '<h3 class="text-light">Historial de consultas de la persona</h3>
        <table class="table table-hover table-dark">
        <thead>
        <tr>
        <td>Consulta</td>
        <td>Otras consultas</td>
        <td>Fecha de registro</td>
        </tr>
        <thead>
        <tbody>
        <tr style="text-align:center;">
        <td colspan=3>Esta persona no tiene consultas</td>
        </tr>
        </tbody>
        </table>
        </div>
        ';
    }

    echo $contenido;
}
