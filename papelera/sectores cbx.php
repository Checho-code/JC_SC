<?php
include 'conexion/conexion.php';
$queryD = ("SELECT id_dpto, nombre_dpto FROM departamentos ORDER BY nombre_dpto ASC");
$resultadoD = mysqli_query($conexion, $queryD);
// error_reporting(0);
?>

<html>

<head>
    <title>ComboBox Ajax, PHP y MySQL</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script> -->
    <script src="js/jquery-3.6.3.min.js"></script>

</head>

<body>

    <h3>CBX ANIDADOS</h3>

    <form action="process.php" method="post">

        <div id="cont-dpto">
            <label for="dpto">Departamentos</label>

            <select id="dpto">
                <option value="0">Seleccione</option>
                <?php
                while ($row = mysqli_fetch_array($resultadoD, MYSQLI_ASSOC)) {
                    echo '<option value="' . $row['id_dpto'] . '">' . $row['nombre_dpto'] . '</option>';
                }

                ?>
            </select>
        </div>

        <div id="cont-city"> </div>

    </form>

    <script type="text/javascript" src="js/cargar_dpto.js"></script>
</body>

</html>