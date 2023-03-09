<?php

include('../conexion/conexion.php');

$ciudad = $_POST['id_ciudad'];

echo '<div class="bg-danger">' . $ciudad . '</div>';

$query = "SELECT * FROM  sectores WHERE id_ciudad  = '$ciudad' AND estado = 0";
$resultado = $mysqli->query($query);

while ($row = $resultado->fetch_assoc()) {
    $html .= "<option value='" . $row['id-sector'] . "'>" . $row['nom_sector'] . "</option>";
}
echo $html;
