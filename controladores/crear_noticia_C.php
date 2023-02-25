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
        $rand = RandomString();
		$id_usuario = $_SESSION['id_usuario'];
		$titulo = $_POST['titulo'];
		$noticia = $_POST['noticia'];
		$estado = $_POST['estado'];
		$fecha_publicacion = date('Y-m-d');


		$imagen = $_FILES['imagen']['name'];
		$temporal = $_FILES['imagen']['tmp_name'];
		$nombrer = strtolower($imagen);
        $nom_img = $rand . '-' . $nombrer;
		$carpeta = 'images/img_noticias';
		move_uploaded_file($temporal, '../' .$carpeta . '/' . $nom_img);

		$query = "INSERT INTO noticias (id_usuario, fecha_publicacion, titulo, noticia, estado, imagen) VALUES ($id_usuario, '$fecha_publicacion', '$titulo', '$noticia', '$estado', '$nom_img')";
		$execute = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

		if ($execute) {
?>
			<script>
				Swal.fire({
					title: 'Muy bien...!',
					text: "La noticia se registro con exito!",
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
					text: "Error al registar noticia, por favor intente de nuevo.!",
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
$buscar_noticias = mysqli_query($conexion, "SELECT * FROM noticias ORDER BY id_noticia");
$dataNoticias = mysqli_fetch_assoc($buscar_noticias);
