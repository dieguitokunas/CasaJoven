<?php

if(isset($_POST["enviarInsertar"])){
    require 'conexion.php';
    $tipo_identificacionInsert=$_POST["tipo_identificacionInsertar"];
    $numero_identificacionInsert=$_POST["numero_identificacionInsertar"];
    $nombreInsert=$_POST["nombreInsertar"];
    $apellidoInsert=$_POST["apellidoInsertar"];
    $fechaInsert=$_POST["fechaInsertar"];
    $sexoInsert=$_POST["sexoInsertar"];
    $nacionalidadInsert=$_POST["nacionalidadInsertar"];
    $consultaInsert=$_POST["consultaInsertar"];
    $otraConsultaInsert=$_POST["otraConsultaInsertar"];
    $comparacionNumero_Identificacion=$con->query("SELECT numero_identificacion FROM personas WHERE numero_identificacion = '$numero_identificacionInsert'");


    if($otraConsultaInsert===""){
        $otraConsultaInsert="Ninguna";
       }


    if($comparacionNumero_Identificacion->num_rows=== 1){
        $insertarConsulta=$con->prepare("INSERT INTO consulta (numero_identificacion,consulta,otra_consulta) VALUES (?,?,?)");
        $insertarConsulta->bind_param("sss",$numero_identificacionInsert,$consultaInsert,$otraConsultaInsert);
        
        if($insertarConsulta->execute()){
            header("location:../index.php");
        }else{
            echo '<script>history.back(); alert("Hubo un error en la carga de datos");</script>';
        }
        
    }elseif ($comparacionNumero_Identificacion->num_rows=== 0){
        $insertarPersonas=$con->prepare("INSERT INTO personas (tipo_identificacion,numero_identificacion,nombre,apellido,sexo,fecha_nacimiento,nacionalidad) VALUES (?,?,?,?,?,?,?)");
        $insertarPersonas->bind_param("sssssss",$tipo_identificacionInsert,$numero_identificacionInsert,$nombreInsert,$apellidoInsert,$sexoInsert,$fechaInsert,$nacionalidadInsert);
        if($insertarPersonas->execute()){
            $insertarConsulta=$con->prepare("INSERT INTO consulta (numero_identificacion,consulta,otra_consulta) VALUES (?,?,?)");
            $insertarConsulta->bind_param("sss",$numero_identificacionInsert,$consultaInsert,$otraConsultaInsert);
            
            if($insertarConsulta->execute()){
                header("location:../index.php");
            }else{
                echo '<script>history.back(); alert("Hubo un error en la carga de datos");</script>';
        }
    }
}else{
    echo 'Error fatal';
}
}
?>