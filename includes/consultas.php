<main class="consultasCerrado bg-danger" id="consultas">

    <h2 class="text-light">Historial de Consultas</h2>
    <div class="bg-dark consultas-cont">
        <div class="filtro-consultas">
            <form id="filtro-form" method="get">

                <select name="consulta-filtro" class="bg-light text-black">
                    <option value="">Mostrar todos los resultados</option>
                <?php
                $filtro_consulta=$con->query("SELECT consultas FROM lista_consultas");

                while( $filtro = $filtro_consulta->fetch_assoc()){
                    echo '<option value="'.$filtro["consultas"].'">'.$filtro["consultas"].'</option>';
                }
                
                ?>
            </select>
            <select name="fecha-carga" class="bg-light text-black">
                <option value="">Mostrar todos los resultados</option>
                <option value="1">Ultimas 24 horas</option>
                <option value="2">Ultimos 7 días</option>
                <option value="3">Ultimos 30 dias</option>
            </select>
            <input type="submit" value="Enviar" class="btn " name="enviarFiltro">
        </form>
        </div>
        <table class="table table-dark table-hover overflow-auto consultas-tabla">
            <thead>
                <tr>
                    <td>DNI</td>
                    <td>Consulta</td>
                    <td>Otras consultas</td>
                    <td>Fecha de carga</td>
                </tr>
            </thead>
            <tbody id="consultas-tabla">

            </tbody>
        </table>
    </div>
    <div class="paginado" id="paginado-consulta">
    <?php
                $conteo2 = $con->query("SELECT COUNT(*) as total FROM consulta");
                $resultado2 = $conteo2->fetch_assoc();
                $total_resultado2 = $resultado2["total"];
                $filas_por_paginacons=10;
                $paginas_totales2 = ceil($total_resultado2 / $filas_por_paginacons);

                for ($i = 1; $i <= $paginas_totales2; $i++) {
                    echo '<a class="btn bg-warning text-dark" href=index.php?consultas-pagina=' . $i . '>' . $i . '</a>';
                }
                ?>
    </div>
</main>
