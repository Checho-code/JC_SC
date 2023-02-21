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

if (!empty($_POST['btnGuardar'])) {
	if (!empty($_POST["titulo"])&& !empty($_POST["noticia"]) && ($_FILES['imagen']['name']!=null)) {
		$id_usuario = $_SESSION['id_usuario'];
		$titulo = $_POST['titulo'];
		$noticia = $_POST['noticia'];
		$fecha_publicacion = date('Y-m-d');


		$nombre_img = $_FILES['imagen']['name'];
		$temporal = $_FILES['imagen']['tmp_name'];
		$carpeta = 'img_noticias';
		$ruta = $carpeta . '/' . $nombre_img;
		move_uploaded_file($temporal, '../'.$carpeta . '/' . $nombre_img);

		$query = "INSERT INTO noticias (id_usuario, fecha_publicacion, titulo, noticia,imagen) VALUES ($id_usuario, '$fecha_publicacion', '$titulo', '$noticia','$ruta')";
		$execute = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

		if ($execute) {
?>
			<script>
				Swal.fire({
					title: 'Muy bien!',
					text: "Registro exitoso!",
					icon: 'success',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
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

	
//Busco el registro de las noticias 
$buscar_noticias = mysqli_query($conexion, "SELECT * FROM noticias ORDER BY id_noticia DESC");
$row_noticias = mysqli_fetch_assoc($buscar_noticias);
