<?php
require('../conexion/conexion.php');

if(!empty($_POST['btnGuardar'])){
    if(!empty($_POST["nombre_marca"])){
    $nom_marca=$_POST['nombre_marca'];


$nombre_img= $_FILES['foto']['name'];
$temporal=$_FILES['foto']['tmp_name'];
$carpeta='img_marcas';
$ruta=$carpeta .'/'. $nombre_img;
move_uploaded_file($temporal,$carpeta .'/'. $nombre_img);

$query="INSERT INTO marcas (nom_marca, logo) VALUES ('$nom_marca', '$ruta')";
$execute=mysqli_query($conexion,$query) or die (mysqli_error($conexion));

if($execute){
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
}else{
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

}else{
    ?>
    <script>
        Swal.fire({
            title: 'Ooopss...!',
            text: "Campos vacios, por favor intente de nuevo.!",
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continuar'
        })
    </script>
    <?php
}
}