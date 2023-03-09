<?php

include('../conexion/conexion.php');

$deptos = $_POST['deptos'];

$sql = "SELECT * FROM  ciudades WHERE id_dpto = '$deptos'";

$result = mysqli_query($conexion, $sql);

$cadena = "<label>Seleccione una Ciudad</label>
           <select id='city' class='form-control' name='ciudad'>";

while ($ver = mysqli_fetch_row($result)) {
    $cadena = $cadena . '<option value=' . $ver[0] . '>' . ($ver[1]) . '</option>';
}

echo $cadena . "</select>";