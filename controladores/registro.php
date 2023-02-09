<?php
require('../conexion/conexion.php');
// require('escape.php');

//capturamos y escapamos todo lo que se envio por el formulario
if (!empty($_POST['btnRegistrar'])) {


	if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["tipo-doc"]) and !empty($_POST["numero"]) and !empty($_POST["tel"]) and !empty($_POST["correo1"]) and !empty($_POST["correo2"]) and !empty($_POST["clave1"]) and !empty($_POST["clave2"])) {

		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$tipo_doc = $_POST["tipo-doc"];
		$num_doc = $_POST["numero"];
		$tel = $_POST["tel"];
		$email = $_POST["correo1"];
		$email2 = $_POST["correo2"];
		$clave_natural = $_POST["clave1"];
		$clave = password_hash($_POST['clave1'], PASSWORD_DEFAULT);
		$clave2 = $_POST["clave2"];
		$nivel = 4;
		$estado = 1;
		$intentos = 0;
		$fecha_registro = date('Y-m-d');

		if ($email === $email2) {
			if ($clave_natural === $clave2) {

				//validamos si existe el usuario
				$validar = "SELECT email, num_doc FROM usuarios WHERE email='$email' OR num_doc='$num_doc'";
				$result = mysqli_query($conexion, $validar);

				if ($result->num_rows > 0) {
					?>
					<script>
						Swal.fire({
							title: 'hooooo nooooo!',
							text: "Usuario registrado OJO ERROR!",
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						}).then((result) => {
							if (result.isConfirmed) {
	
								// window.location = '../vistas/login.php';
							}
						})
					</script>
				<?php
					
				} else {
					echo "No Encontrados los campos";
					//Registramos el usuario
					$sql = $conexion->query("INSERT INTO usuarios (nombre_usuario,apellido_usuario,tipo_doc,num_doc,telefono,email,clave,rku,nivel,estado,intentos,fecha_registro) VALUES('$nombre', '$apellido','$tipo_doc', '$num_doc','$tel','$email','$clave','$clave2','$nivel','$estado','$intentos','$fecha_registro')");
					if ($sql) {
?>
						<script>
							Swal.fire({
								title: 'Registro realizado con éxito!',
								text: "A tu bandeja de entrada de correo llegara un mensaje de bienvenida y recordaremos tus datos de registro.!",
								icon: 'success',
								confirmButtonColor: '#3085d6',
								confirmButtonText: 'Continuar'
							}).then((result) => {
								if (result.isConfirmed) {

									window.location = '../vistas/login.php';
								}
							})
						</script>
					<?php

					}
				}
			} else {
				?>
				<script>
					Swal.fire({
						title: 'hooooo nooooo!',
						text: "Calves no coinciden.!",
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Continuar'
					}).then((result) => {
						if (result.isConfirmed) {

							// window.location = '../vistas/login.php';
						}
					})
				</script>
			<?php
			}
		} else {
			?>
			<script>
				Swal.fire({
					title: 'hooooo nooooo!',
					text: "Email no iguales.!",
					icon: 'success',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {

						// window.location = '../vistas/login.php';
					}
				})
			</script>
		<?php
		}
	} else {
		?>
		<script>
			Swal.fire({
				title: 'Opppsssss  OJO !',
				text: "Hhhhaaa campos vacios.!",
				icon: 'error',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Continuar'
			}).then((result) => {
				if (result.isConfirmed) {

					// window.location = '../vistas/login.php';
				}
			})
		</script>
<?php

	}
}
