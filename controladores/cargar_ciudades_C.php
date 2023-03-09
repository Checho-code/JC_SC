<?php

include('../conexion/conexion.php');

$deptos = $_POST['id_dpto'];
// $id_estado = $_POST['id_estado'];
echo '<div class="bg-danger">' . $deptos . '</div>';



$queryM = "SELECT * FROM  ciudades WHERE id_dpto = '$deptos' AND estado = 1";
$resultadoM = $mysqli->query($queryM);

$html = "<option value='0'>Seleccionar Municipio</option>";

while ($rowM = $resultadoM->fetch_assoc()) {
    $html .= "<option value='" . $rowM['id_ciudad'] . "'>" . $rowM['nombre_ciudad'] . "</option>";
}

echo $html;
