<?php
require 'conexion.php';
if(isset($_GET["numero_identificacion"])){
    $numero_identificacion=$_GET["numero_identificacion"];
    if($numero_identificacion!== ""){
        $borrar=$con->prepare("DELETE personas,consulta FROM personas left JOIN consulta ON personas.numero_identificacion=consulta.numero_identificacion WHERE personas.numero_identificacion=? ");
        $borrar->bind_param("s",$numero_identificacion);
        $borrar->execute();
        $borrar->close();
        header("location:../index.php");
    }else{
        echo '<script>history.back(); alert("No hay ningun numero de identificacion seleccionado");</script>';
    }
}

?>