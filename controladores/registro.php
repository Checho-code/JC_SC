<?php
require('../conexion/conexion.php');
// require('escape.php');

//capturamos y escapamos todo lo que se envio por el formulario
if (!empty($_POST["btn-R"])) {

	if (!empty($_POST["nomb"]) and !empty($_POST["ape"]) and !empty($_POST["tipo"]) and !empty($_POST["num"]) and !empty($_POST["tel"]) and !empty($_POST["corr"]) and !empty($_POST["corr1"]) and !empty($_POST["cla1"]) and !empty($_POST["cla2"])) {

		$nombre = $_POST["nomb"];
		$apellido = $_POST["ape"];
		$tipo_doc = $_POST["tipo"];
		$num_doc = $_POST["num"];
		$tel = $_POST["tel"];
		$email = $_POST["corr"];
		$email2 = $_POST["corr1"];
		$clave_natural = $_POST["cla1"];
		$clave = password_hash($_POST['cla1'], PASSWORD_DEFAULT);
		$clave2 = $_POST["cla2"];
		$nivel = 4;
		$estado = 1;
		$intentos = 0;
		$fecha_registro = date('Y-m-d');

		//Registramos el usuario

		$sql = $conexion->query("INSERT INTO usuarios (nombre_usuario,apellido_usuario,tipo_doc,num_doc,telefono,email,clave,rku,nivel,estado,intentos,fecha_registro) VALUES('$nombre', '$apellido','$tipo_doc', '$num_doc','$tel','$email','$clave','$clave2','$nivel','$estado','$intentos','$fecha_registro')");

		if ($sql) { ?>
			<script>
				Swal.fire({
					title: 'Registro realizado con éxito!',
					text: "A tu bandeja de entrada de correo llegara un mensaje de bienvenida y recordaremos tus datos de registro.!",
					icon: 'success',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {
						
						window.location ='../vistas/login.php';
					}
				})
			</script>
<?php
			
		}
	}
}

?>