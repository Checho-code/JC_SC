<?php
require('../conexion/conexion.php');



if (isset($_POST['btnSaveCat'])) {

	if (!empty($_POST["nombre_categoria"]) && ($_POST["marca"] != "0")) {


		$nombre = $_POST['nombre_categoria'];
		$marca = $_POST['marca'];

		$query = "INSERT INTO categorias (nom_categoria, id_marca ) VALUES ('$nombre', '$marca')";
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
						window.location.href="../vistas/categorias_V.php";
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

$b_categ = mysqli_query($conexion, "SELECT * FROM categorias  ORDER BY id_categoria;");
$dataCateg = mysqli_fetch_assoc($b_categ);