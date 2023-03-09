<?php
require('../conexion/conexion.php');



if (isset($_POST['btnGuardar'])) {

	if (($_POST["dpto"] != "0") && ($_POST["ciudad"] != "0") &&  (!empty($_POST["sector"]))) {


		$depto = $_POST['dpto'];
		$city = $_POST['ciudad'];
		$sector = $_POST['sector'];
		$estSect = 0;

		$query = "INSERT INTO sectores (nom_sector, estado, id_ciudad, id_dpto  ) VALUES ('$sector', '$estSect','$city','$depto')";
		$execute = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

		if ($execute) {
?>
			<script>
				Swal.fire({
					title: 'Muy bien...!',
					text: "Registro exitoso.!",
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = "../vistas/sectores_V.php";
					}
				})
			</script>
		<?php

		} else {
		?>
			<script>
				Swal.fire({
					title: 'Ooopss...!',
					text: "Error al registar categoria, por favor intente de nuevo.!",
					icon: 'error',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				})
			</script>
		<?php
		}
	} else {
		?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Ooopss...!',
				text: "Hay campos vacios, por favor intente de nuevo.!",
				confirmButtonColor: '#177c03',
				confirmButtonText: 'Continuar'
			})
		</script>
<?php
	}
}


$b_sector = mysqli_query($conexion, "SELECT * FROM sectores");
$dataSector = mysqli_fetch_assoc($b_sector);
