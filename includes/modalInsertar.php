<?php
$selectIden=$con->query("SELECT tipo_identificacion FROM tipo_identificacion");
$selectSexo=$con->query("SELECT sexo FROM sexos");
$selectNac=$con->query("SELECT nacionalidad FROM nacionalidad");
$selectCons=$con->query("SELECT consultas FROM lista_consultas");
?>

<div class="modalInsertar bg-success" id="modal-insertar">
    <div class="modalHead">
        <i class="fa-solid fa-xmark" id="closeInsertar"></i>
    </div>
    <form action="db/insertar.php" method="POST" id="form-insertar">
        <div class="modalPersona">
            <center>
                <h2 class="text-light">Agregar persona</h2>
            </center>
            <select id="tipo_identificacionInsertar" name="tipo_identificacionInsertar">
                <option value="">Tipo de Identificación</option>
                <?php

            while($row = $selectIden->fetch_assoc()){
                echo '<option value="'.$row["tipo_identificacion"].'">'.$row["tipo_identificacion"].'</option>';
            }


?>
            </select>

            <input type="text" placeholder="DNI" id="dniInsertar" name="numero_identificacionInsertar">
            <input type="text" placeholder="Nombre" id="nombreInsertar" name="nombreInsertar">
            <input type="text" placeholder="Apellido" id="apellidoInsertar" name="apellidoInsertar">
            <div class="fecha">
                <label>Fecha de nacimiento:</label>
                <input type="date" name="fechaInsertar" id="fechaInsertar">
            </div>



            <select name="sexoInsertar" id="sexoInsertar">
                <option value="">Sexo:</option>
                <?php
                while($row = $selectSexo->fetch_assoc()){
                echo '<option value="'.$row["sexo"].'">'.$row["sexo"].'</option>';
            }
            ?>


            </select>

            <select name="nacionalidadInsertar" id="nacionalidadInsertar">
                <option value="">Nacionalidad:</option>
                
                <?php
                while($row = $selectNac->fetch_assoc()){
                echo '<option value="'.$row["nacionalidad"].'">'.$row["nacionalidad"].'</option>';
            }
            ?>
            </select>
            <button class="btn text-black continuar" id="insertarPersonaButton">Continuar</button>
        </div>
        <div class="modalConsulta" id="modalconsulta">
            <center>
                <h2 class="text-light">Agregar consulta</h2>
            </center>



            <select name="consultaInsertar" id="consultaInsertar" >
                <option value="">Seleccionar una consulta</option>
              
                <?php
                while($row = $selectCons->fetch_assoc()){
                echo '<option value="'.$row["consultas"].'">'.$row["consultas"].'</option>';
            }
            ?>
            </select>
            <input type="text" name="otraConsultaInsertar" id="otraConsultaInsertar" placeholder="Ingresar otra consulta" >
            <div class="enviarInsert">
                <button class="btn fa-solid fa-arrow-left" id="regresarInsertar"></button>
                <input type="submit" id="enviarInsertar" name="enviarInsertar" value="Enviar registro" class="btn">
            </div>
        </div>

    </form>
</div>