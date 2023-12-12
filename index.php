<?php
require './db/conexion.php';

session_start();

if(isset($_SESSION['id'])&&$_SESSION['id']=="casajoven"){
    ?>
<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos/index.css">
    <script src="https://kit.fontawesome.com/825e76f8f3.js" crossorigin="anonymous"></script>
    <script src="bootstrap/js/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</style>
</head>

<body class="bg-dark">
    
<header class="bg-primary">

        <ul>
            <div class=""> 
                <li id="personas-link2" class="active">Personas</li>
                <li id="consultas-link2">Consultas</li>
                <li><a href="totem.php" style="text-decoration:none;color:#000;">Ir al totem</a></li>
            </div>
            <li><a href="includes/cerrar_sesion.php" style="text-decoration:none;color:#000;">Cerrar sesión</a></li>
        </ul>
</header>
    
    <div class="app">
        <aside class="bg-primary">
            <img src="img/logo4.png" alt="CasaJoven_Diego_Armando_Maradona">
            <div class="links">
                <ul>
                    <li id="personas-link" class="active">Personas</li>
                    <li id="consultas-link">Consultas</li>
                    <li><a href="totem.php" style="text-decoration:none;color:#000;">Ir al totem</a></li>
                    <li><a href="includes/cerrar_sesion.php" style="text-decoration:none;color:#000;">Cerrar sesión</a></li>
                </ul>
            </div>
        </aside>
        <main class="detallesCerrado bg-danger" id="detalles">
            
            </main>
            <main class="bg-danger personas" id="personas">
                
                
                <?php
            require 'includes/modalEditar.php';
            require 'includes/modalInsertar.php';
            ?>


<h2 class="text-light">Personas registradas</h2>
<div class="table-cont bg-dark">
    <section class="bg-dark filtros">
        <form action="index.php" method="get" class="bg-light form-busqueda">
            <input type="text" name="buscador" placeholder="Buscar...">
            <button class="fa-solid fa-search" name="enviar-busqueda"></button>
        </form>
        
        
        
        <form action="index.php" method="get" class=" form-filtros">
            <select name="filtro-identificacion">
                <option value="">Tipo de identificacion</option>
                <?php
                            $iden2 = $con->query("SELECT tipo_identificacion FROM tipo_identificacion");
                            while ($row = $iden2->fetch_assoc()) {
                                echo '<option value="' . $row["tipo_identificacion"] . '">' . $row["tipo_identificacion"] . '</option>';
                            }
                            ?>
                        </select>
                        <select name="filtro-sexo">
                            <option value="">Sexo</option>
                            <?php
                            $sexo2 = $con->query("SELECT sexo FROM sexos");
                            while ($row = $sexo2->fetch_assoc()) {
                                echo '<option value="' . $row["sexo"] . '">' . $row["sexo"] . '</option>';
                            }
                            ?>
                        </select>
                        <select name="filtro-nacionalidad">
                            <option value="">Nacionalidad</option>
                            <?php
                            $nacionalidad2 = $con->query("SELECT nacionalidad FROM nacionalidad");
                            while ($row = $nacionalidad2->fetch_assoc()) {
                                echo '<option value="' . $row["nacionalidad"] . '">' . $row["nacionalidad"] . '</option>';
                            }
                            ?>
                        </select>
                        <select name="filtro-edad">
                            <option value="">Edad</option>
                            <option value="1">
                                16-25 años
                            </option>
                            <option value="2">
                                26-50 años
                            </option>
                            <option value="3">
                                51 años en adelante
                            </option>
                        </select>
                        <button class="fa-solid fa-arrow-right bg-warning" name="enviar-filtro"></button>
                    </form>
                    <button class="fa-solid fa-plus bg-success" id="agregar"></button>
                </section>
                <table class="table table-sm-lg table-dark overflow-auto">
                    <thead>
                        <tr>
                            <th>Visitas</th>
                            <th>Tipo de Identificacion</th>
                            <th>Numero de Identificacion</th>
                            <th>Nombre/s</th>
                            <th>Apellido/s</th>
                            <th>Fecha de nacimiento</th>
                            <th>Sexo</th>
                            <th>Nacionalidad</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Paginado de la tabla
                        if (isset($_GET['pagina'])) {
                            $pagina = $_GET['pagina'];
                        } else {
                            $pagina = 1;
                        }
                        $filas_por_pagina = 100;
                        $offset = ($pagina - 1) * $filas_por_pagina;                        //////
                        $tabla = $con->query("SELECT * FROM personas limit $offset,$filas_por_pagina");
                        
                        
                        //Validacion de busqueda por selects
                        if (isset($_GET["enviar-filtro"])) {
                            $tabla_filtro = "SELECT *FROM personas WHERE 1";
                            $iden_filtro = $_GET["filtro-identificacion"];
                            $sexo_filtro = $_GET["filtro-sexo"];
                            $nacionalidad_filtro = $_GET["filtro-nacionalidad"];
                            $edad_filtro = $_GET["filtro-edad"];
                            
                            if ($iden_filtro !== "") {
                                $tabla_filtro .= " AND tipo_identificacion='$iden_filtro'";
                            }
                            if ($sexo_filtro !== "") {
                                $tabla_filtro .= " AND sexo='$sexo_filtro'";
                            }
                            if ($nacionalidad_filtro !== "") {
                                $tabla_filtro .= " AND nacionalidad='$nacionalidad_filtro'";
                            }
                            if ($edad_filtro !== "") {
                                switch ($edad_filtro) {
                                    case "1":
                                        $tabla_filtro .= " AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) BETWEEN 16 AND 25";
                                        break;
                                        case "2":
                                        $tabla_filtro .= " AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) BETWEEN 26 AND 50";
                                        break;
                                        case "3":
                                            $tabla_filtro .= " AND TIMESTAMPDIFF(YEAR, fecha_nacimiento, NOW()) >=51";
                                            break;
                                        }
                                    }
                                    
                                    $tabla_filtro .= "  LIMIT $offset,$filas_por_pagina";
                                    $query = $con->query($tabla_filtro);
                                } else {
                                    $query = $tabla;
                                }
                                //Validacion de busqueda por texto
                                if (isset($_GET["enviar-busqueda"])) {
                                    $buscador = $_GET["buscador"];
                                    
                                    if (!empty($buscador)) {
                                        $palabras_clave = explode(" ", $buscador);
                                        
                                        $tabla_buscar = "SELECT * FROM personas WHERE ";
                                        
                                        foreach ($palabras_clave as $palabra) {
                                            $palabra_minus = strtolower($palabra);
                                            $tabla_buscar .= "CONCAT(tipo_identificacion,numero_identificacion,nombre,apellido,sexo,fecha_nacimiento,nacionalidad) LIKE '%$palabra_minus%' AND ";
                                        }
                                        
                                        $tabla_buscar = rtrim($tabla_buscar, " AND ");
                                        $tabla_buscar .= " LIMIT $offset,$filas_por_pagina";
                                        
                                        $query = $con->query($tabla_buscar);
                                    }
                                }

                                
                                if ($query->num_rows > 0) {
                                    while ($row = $query->fetch_assoc()) {
                                        $conteo_numero_identificacion = $row["numero_identificacion"];
                                        $visitas=$con->query("SELECT COUNT(id_consulta) as visitas FROM consulta WHERE numero_identificacion='$conteo_numero_identificacion'");
                                        $visitas=$visitas->fetch_assoc();
                                        echo '<tr>';
                                        echo '<td>'. $visitas["visitas"]. '</td>';
                                        echo '<td hidden>' . $row["id_persona"] . '</td>';
                                        echo '<td><a href="#" data-dni="'.$row["numero_identificacion"].'"> ' . $row["tipo_identificacion"] . '</a></td>';
                                        echo '<td><a href="#" data-dni="'.$row["numero_identificacion"].'">' . $row["numero_identificacion"] . '</td>';
                                        echo '<td><a href="#" data-dni="'.$row["numero_identificacion"].'">' . $row["nombre"] . '</td>';
                                        echo '<td><a href="#" data-dni="'.$row["numero_identificacion"].'">' . $row["apellido"] . '</td>';
                                        echo '<td><a href="#" data-dni="'.$row["numero_identificacion"].'">' . $row["fecha_nacimiento"] . '</td>';
                                        echo '<td><a href="#" data-dni="'.$row["numero_identificacion"].'">' . $row["sexo"] . '</td>';
                                        echo '<td><a href="#" data-dni="'.$row["numero_identificacion"].'">' . $row["nacionalidad"] . '</td>';
                                        echo '<td><button class="editar btn bg-warning" onclick="Modal()">Editar</button></td>';
                                        echo '<td><a class="btn bg-danger" href="db/borrar.php?numero_identificacion=' . $row["numero_identificacion"] . '">Borrar</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr style="text-align:center;">';
                                    echo '<td colspan="9">No se encontraron resultados coincidentes</td>';
                                    echo '</tr>';
                                }
                                
                                ?>
                    </tbody>
                </table>
                
            </div>
            <div class="paginado">
                <?php
                $conteo = $con->query("SELECT COUNT(*) as total FROM personas");
                $resultado = $conteo->fetch_assoc();
                $total_resultado = $resultado["total"];
                $paginas_totales = ceil($total_resultado / $filas_por_pagina);
                
                for ($i = 1; $i <= $paginas_totales; $i++) {
                    echo '<a class="btn bg-warning text-dark" href=index.php?pagina=' . $i . '>' . $i . '</a>';
                }
                ?>
            </div>
            
        </main>
        
        <?php
        require 'includes/consultas.php';
        require 'db/detalles.php';
        ?>
    </div>
    <script>
        
        const personas = document.getElementById("personas");
        const personasLink = document.getElementById("personas-link");
        personasLink.addEventListener("click", function() {
            if (personas.classList.contains("personasCerrado")) {
                if(detalles.classList.contains("detallesAbierto")){
                    detalles.classList.remove("detallesAbierto");
                    detalles.classList.add("detallesCerrado");
                }
                personas.classList.remove("personasCerrado");
                personas.classList.add("personas");
                personasLink.classList.add("active");
                consultasLink.classList.remove("active");
                consultas.classList.add("consultasCerrado");
                consultas.classList.remove("consultasAbierto");
            }
        })
        function Regresar() {
            personas.classList.remove("personasCerrado");
            personas.classList.add("personas");
            detalles.classList.remove("detallesAbierto");
            detalles.classList.add("detallesCerrado");
        }
        
        </script>
    <script src="includes/consultas.js"></script>
    <script src="includes/detalles.js"></script>
    <script src="includes/modalEditar.js"></script>
    <script src="includes/modalInsertar.js"></script>
</body>
</html>
<?php
} else {
    ?>
    <html>
        <header>
            <link rel="stylesheet" href="estilos/index.css">
            
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        </header>
        <body class="pagina_oculta">
            
                
                <form action="includes/sesion.php" method="post">
                <h2>Ingrese el codigo de acceso</h2>
                <input type="password" name="id" placeholder="..." required>
                    <input type="submit" value="Ingresar">
                </form>
        </body>
    </html>
    <?php
}
?>