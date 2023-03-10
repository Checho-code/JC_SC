<?php

include('../conexion/conexion.php');

$deptos = $_POST['ciudad'];



$queryS = "SELECT id_sector , nom_sector FROM  sectores WHERE id_ciudad = '$deptos' AND estado = 1";
$resultadoS = mysqli_query($conexion, $queryS);

$html = "
                        <select id='sector' name='sector' class='form-control'>
                        <option value='0'>Seleccione</option>";

while ($rowS = $resultadoS->fetch_assoc()) {
    $html .= "<option value='" . $rowS['id_sector'] . "'>" . $rowS['nom_sector'] . "</option>";
}

echo $html;
