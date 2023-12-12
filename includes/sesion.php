<?php
session_start();
if (isset($_POST["id"])&&$_POST["id"]=="casajoven"){
    $_SESSION["id"] = $_POST["id"];
    header("Location: ../index.php");
}else{
    echo "<script>alert('Codigo incorrecto'); history.back();  </script>";
}

?>