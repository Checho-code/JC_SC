<?php

include('../conexion/conexion.php');

$marca = $_POST['marca'];

$sql = "SELECT * FROM  categorias WHERE id_marca = '$marca'";

$result = mysqli_query($conexion, $sql);

$cadena = "<label>Categorias *</label>
 <select id='categoria' class='form-control'  name='categoria'>";

while ($ver = mysqli_fetch_row($result)) {
    $cadena = $cadena . '<option value=' . $ver[0] . '>' . ($ver[1]) . '</option>';
}

echo $cadena . "</select>";

