<?php
require 'conexion.php';

if (isset($_GET['consultas-pagina'])) {
    $pagina = $_GET['consultas-pagina'];
} else {
    $pagina = 1;
}
$filas_por_pagina = 10;
$offset = ($pagina - 1) * $filas_por_pagina;

if (isset($_GET["enviarFiltro"])) {
    $consultaFiltro = $_GET["consulta-filtro"];
    $fechaFiltro = $_GET["fecha-carga"];
    $prepararQuery="SELECT * FROM consulta WHERE 1";

    if ($consultaFiltro !== "") {
        $prepararQuery.=" AND consulta = '$consultaFiltro'";
    }
    
    
    if ($fechaFiltro !== "") {
        switch ($fechaFiltro) {
            case 1:
                $prepararQuery.= " AND fecha_carga >= DATE_SUB(NOW(), INTERVAL 1 DAY) AND fecha_carga <= NOW()";
                break;
                
            case 2:
                $prepararQuery.= " AND fecha_carga >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND fecha_carga <= NOW()";
                break;
                
            case 3:
                $prepararQuery.= " AND fecha_carga >= DATE_SUB(NOW(), INTERVAL 30 DAY) AND fecha_carga <= NOW()";
                break;
    }
}
$prepararQuery.=" LIMIT $offset, $filas_por_pagina" ;
$consultas=$con->query($prepararQuery);
} else {
    $consultas = $con->query("SELECT * FROM consulta LIMIT $offset, $filas_por_pagina");
}


if($consultas->num_rows > 0) {
while ($row = $consultas->fetch_assoc()) {
    $fechaCortada=substr($row["fecha_carga"],0,16);
    echo '<tr>';
    echo '<td>' . $row["numero_identificacion"] . '</td>';
    echo '<td>' . $row["consulta"] . '</td>';
    echo '<td>' . $row["otra_consulta"] . '</td>';
    echo '<td>' . $fechaCortada . '</td>';
    echo '</tr>';
}
}else{
    echo '<tr style="text-align:center;">';
    echo '<td colspan="4">No se encontraron registros</td>';
    echo '</tr>';
}