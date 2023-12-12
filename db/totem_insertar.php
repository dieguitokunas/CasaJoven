<?php
require 'conexion.php';
if (isset($_POST['enviarPersona'])) {
    $tipo_identificacion = $_POST['tipo_identificacion'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $sexo = $_POST['sexo'];
    $nacionalidad = $_POST['nacionalidad'];
    $consulta = $_POST['consulta'];
    $otra_consulta = $_POST['otra_consulta'];

    if($otra_consulta==""){
        $otra_consulta="Ninguna";
    }
    

    $personasRegistradas=$con->query("select numero_identificacion from personas where numero_identificacion='$numero_identificacion'");

    if ($personasRegistradas->num_rows > 0) {
        $insertarSoloConsulta=$con->prepare("INSERT INTO consulta (numero_identificacion,consulta,otra_consulta) VALUES (?,?,?)");
        $insertarSoloConsulta->bind_param("sss",$numero_identificacion,$consulta,$otra_consulta);
        $insertarSoloConsulta->execute();
        $insertarSoloConsulta->close();
       
        if($insertarSoloConsulta){
            header("Location:../totem.php");
        }else{
            echo "<script>history.back() alert('Algo salio mal')</script>";
        }
}
else{
    $insertarPersona=$con->prepare("INSERT INTO personas (tipo_identificacion,numero_identificacion,nombre,apellido,fecha_nacimiento,sexo,nacionalidad) VALUES (?,?,?,?,?,?,?)");
    $insertarPersona->bind_param("sssssss",$tipo_identificacion,$numero_identificacion,$nombre,$apellido,$fecha,$sexo,$nacionalidad);
    
    if($insertarPersona->execute()){
        $insertarPersona->close();

        $insertarConsulta=$con->prepare("INSERT INTO consulta (numero_identificacion,consulta,otra_consulta) VALUES (?,?,?)");
        $insertarConsulta->bind_param("sss",$numero_identificacion,$consulta,$otra_consulta);
        
        $insertarConsulta->execute();
        $insertarConsulta->close();
        if($insertarConsulta){
            header("location:../totem.php");
        }else{
            echo "<script>history.back() alert('Algo salio mal')</script>";
        }

        }else{
            echo '<script>history.back(); alert("Hubo un error en la carga de datos");</script>';
            
        }
    }
}

if(isset($_POST['enviarSoloConsulta'])){

$numero_identificacion=$_POST["numero_identificacionConsulta"];

$consulta=$_POST["consultaConsulta"];

$otra_consulta=$_POST["otra_consultaConsulta"];

if($numero_identificacion!=""){
    $insertar=$con->prepare("INSERT INTO consulta (numero_identificacion, consulta,otra_consulta) VALUES (?,?,?)");
    $insertar->bind_param("sss",$numero_identificacion,$consulta,$otra_consulta);
    $insertar->execute();
    $insertar->close();
    if($insertar){
        header("location:../totem.php");
    }else{
        echo "<script>history.back() alert('Algo salio mal')</script>";
    }
}
}else{
    header("location:../totem.php");
}
?>