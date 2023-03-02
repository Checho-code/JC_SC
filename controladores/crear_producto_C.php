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

if (isset($_POST['btnGuardar'])) {

	if (($_POST['marca']!="Seleccione") && ($_POST['categoria']!="Seleccione") && !empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['unidad']) && ($_POST['porcentaje']!="Seleccione") && !empty($_POST['descripcion']) && ($_POST['estado']!="Seleccione") && ($_POST['destacado']!="Seleccione") && ($_FILES['imagen']['name'] != null)) {
		$rand = RandomString();

		$nombre_producto = ($_POST['nombre']);
		$precio = ($_POST['precio']);
		$unidad = ($_POST['unidad']);
		$porcentaje = ($_POST['porcentaje']);
		$descripcion = ($_POST['descripcion']);
		$estado = ($_POST['estado']);
		$destacado = ($_POST['destacado']);
		$marca = ($_POST['marca']);
		$categoria = ($_POST['categoria']);

		$imagen = $_FILES['imagen']['name'];
		$temporal = $_FILES['imagen']['tmp_name'];
		$nombrer = strtolower($imagen);
		$nom_img = $rand . '-' . $nombrer;
		$carpeta = 'images/img_productos';
		move_uploaded_file($temporal, '../' . $carpeta . '/' . $nom_img);


		$stmt = $conexion->prepare("INSERT INTO productos (nom_producto, precio, unidad, porcentaje, descripcion, imagen, estado, destacado, id_marca, id_categoria ) VALUES (?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sisdsssiii', $nombre_producto, $precio, $unidad, $porcentaje, $descripcion, $nom_img, $estado, $destacado, $marca, $categoria);
		$stmt->execute();
		$stmt->close();

		if ($stmt) {
			/**	alerta reg exitoso */
			?>
			<script>
				Swal.fire({
					title: 'Muy bien...!',
					text: "Registro realizado con éxito.!",
					icon: 'success',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {

						window.location.href  = 'listar-producto.php';
					}
				})
			</script>
			<?php
		} else {
			/**	alerta reg invalido */
			?>
			<script>
				Swal.fire({
					title: 'Ooopss...!',
					text: "Lo sentimos, no se pudo completar el registro, vuelve a intentarlo.!",
					icon: 'error',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				})
			</script>
			<?php
		}
	} else {
		/**cerrar si no vacios */
		?>
		<script>
			Swal.fire({
				title: 'Ooopss...!',
				text: "Lo sentimos, debes completar todos los campos para realizar el proceso de registro, vuelve a intentarlo.!",
				icon: 'error',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Continuar'
			})
		</script>
		<?php
	}
}
/**cerrar btnGuardar */

//Busco el registro de las noticias 
$b_productos = mysqli_query($conexion, "SELECT * FROM productos ORDER BY id_producto");
$dataProduct = mysqli_fetch_assoc($b_productos);