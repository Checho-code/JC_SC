<?php
	require ('../conexion/conexion.php');
	
	$id_dpto= $_POST['id_depto'];

	$queryM = "SELECT id_ciudad , nombre_ciudad FROM ciudades WHERE id_dpto = '$id_dpto' ORDER BY nombre_ciudad ASC";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Ciudad</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_ciudad']."'>".$rowM['nombre_ciudad']."</option>";
	}
	
	echo $html;
?>
