<?php
include 'conexion/conexion.php';
$queryD = ("SELECT id_dpto, nombre_dpto FROM departamentos ORDER BY nombre_dpto ASC");
$resultadoD = mysqli_query($conexion, $queryD);
// error_reporting(0);
?>

<html>
	<head>
		<title>ComboBox Ajax, PHP y MySQL</title>
		
		<script language="javascript" src="js/jquery-3.6.3.min.js"></script>
		
		
	</head>
	
	<body>
	<form action="process.php" method="post">
            <select name="dpto" id="dpto">
                <option value="-1"></option>
                <?php
                foreach ($resultadoD as $dpto) {
                    ?>
                    <option value="<?php echo $dpto['id_dpto']; ?>"><?php echo $dpto['nombre_dpto']; ?></option>
                    <?php
                }
                ?>
            </select>
            <select name="city" id="city"></select>
        </form>

	

	</body>
</html>