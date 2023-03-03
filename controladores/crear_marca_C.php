<?php
require('../conexion/conexion.php');

function RandomString()
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randstring = '';
	for ($i = 0; $i < 30; $i++) {
		$randstring = @$randstring . @$characters[rand(0, strlen($characters))];
	}
	return $randstring;
}

if (isset($_POST['btnSaveMarca'])) {

	if (!empty($_POST["nombre_marca"]) && ($_FILES['foto']['name'] != null) && !empty($_POST["estado"])){

		$rand = RandomString();
		$nom_marca = $_POST['nombre_marca'];
		$estado = $_POST['estado'];

		$imagen = $_FILES['foto']['name'];
		$temporal = $_FILES['foto']['tmp_name'];
		$nombrer = strtolower($imagen);
		$nom_img = $rand . '-' . $nombrer;
		$carpeta = 'images/img_marcas';
		move_uploaded_file($temporal, '../' . $carpeta . '/' . $nom_img);

		$query = "INSERT INTO marcas (nom_marca, logo, estado) VALUES ('$nom_marca', '$nom_img', '$estado')";
		$execute = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

		if ($execute) {
			?>
			<script>
				Swal.fire({
					title: 'Muy bien!',
					text: "Registro exitoso!",
					icon: 'success',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar',
				})
			</script>
			<?php

		} else {
			?>
			<script>
				Swal.fire({
					title: 'Ooopss...!',
					text: "Error al registar marca, por favor intente de nuevo.!",
					icon: 'error',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				})
			</script>
			<?php
		}
	}else {
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

//Juego de registros de los premios creados

$b_marca = mysqli_query($conexion, "SELECT * FROM marcas  ORDER BY id_marca;");
$dataMarca = mysqli_fetch_assoc($b_marca);