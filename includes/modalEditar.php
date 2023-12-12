<div class="modal bg-primary" id="modal">
                <div class="modalHead">
                    <i class="fa-solid fa-xmark" id="closeEditar"></i>
                </div>
               <center> <h2 class="text-light">Editar datos </h2></center>
                <form action="db/editar.php" method="POST" id="form-editar">
                    <input type="hidden" name="id_persona" id="id">
                    <select name="tipo_identificacion" id="tipo_identificacion">
                        <option value="">Tipo de Identificacion</option>
                        <?php
                        $iden = $con->query("SELECT tipo_identificacion FROM tipo_identificacion");
                        while ($row = $iden->fetch_assoc()) {
                            echo '<option value="' . $row['tipo_identificacion'] . '">' . $row['tipo_identificacion'] . '</option>';
                        }

                        ?>
                    </select>
                    <input type="text" placeholder="Numero de identificacion" id="numero_identificacion" name="numero_identificacionEditar">
                    <input type="text" placeholder="Nombre" id="nombre" name="nombre">
                    <input type="text" placeholder="Apellido" id="apellido" name="apellido">
                    <div>
                        <label>Fecha de nacimiento:</label>
                        <input type="date" name="fecha" id="fecha">
                    </div>
                    <select name="sexo" id="sexo">
                        <option value="">Sexo:</option>
                        <?php
                        $sexo = $con->query('SELECT sexo FROM sexos');
                        while ($row = $sexo->fetch_assoc()) {
                            echo '<option value="' . $row['sexo'] . '">' . $row['sexo'] . '</option>';
                        } ?>
                    </select>
                    <select name="nacionalidad" id="nacionalidad">
                        <option value="">Nacionalidad:</option>
                        <?php
                        $nacionalidad = $con->query('SELECT nacionalidad FROM nacionalidad');
                        while ($row = $nacionalidad->fetch_assoc()) {
                            echo '<option value="' . $row['nacionalidad'] . '">' . $row['nacionalidad'] . '</option>';
                        }

                        ?>
                    </select>
                    <input type="submit" value="Actualizar" name="editar" class="btn" id="actualizarButton">
                </form>
            </div>