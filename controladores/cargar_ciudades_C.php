<?php

include('../conexion/conexion.php');

$deptos = $_POST['deptos'];



$queryM = "SELECT id_ciudad, nombre_ciudad FROM  ciudades WHERE id_dpto = '$deptos' AND estado = 1";
$resultadoM = mysqli_query($conexion, $queryM);

$html = "<select require id='ciudad' name='ciudad' class='form-control'>
                        <option value='0'>Seleccione</option>";

while ($rowM = $resultadoM->fetch_assoc()) {
    $html .= "<option value='" . $rowM['id_ciudad'] . "'>" . $rowM['nombre_ciudad'] . "</option>";
}

echo $html;
