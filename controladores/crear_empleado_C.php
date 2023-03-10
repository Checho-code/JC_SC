<?php
require('../conexion/conexion.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require('escape.php');

//capturamos y escapamos todo lo que se envio por el formulario
if (!empty($_POST['btnRegistrar'])) {

	if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["tipo-doc"]) and !empty($_POST["numero"]) and !empty($_POST["tel"]) and ($_POST["nivel"] !="Seleccione") and !empty($_POST["correo1"]) and !empty($_POST["correo2"]) and !empty($_POST["clave1"]) and !empty($_POST["clave2"])) {

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
		$nivel = $_POST["nivel"];
		$estado = 1;
		$intentos = 0;
		$fecha_registro = date('Y-m-d');

		if ($email === $email2) {

			if ($clave_natural === $clave2) {

				//validamos si existe el usuario
				$validar = "SELECT * FROM usuarios WHERE email='$email' OR num_doc='$num_doc'";
				$result = mysqli_query($conexion, $validar);

				if ($result->num_rows > 0) {
?>
					<script>
						Swal.fire({
							title: 'Ooopss...!',
							text: "Usuario y/o numero de documento ya se encuentran resgistrados, por favor verifique e intente de nuevo.!",
							icon: 'error',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Continuar'
						})
					</script>
					<?php

				} else {

					//Registramos el usuario
					$sql = $conexion->query("INSERT INTO usuarios (nombre_usuario,apellido_usuario,tipo_doc,num_doc,telefono,email,clave,rku,nivel,estado,intentos,fecha_registro) VALUES('$nombre', '$apellido','$tipo_doc', '$num_doc','$tel','$email','$clave','$clave2','$nivel','$estado','$intentos','$fecha_registro')");
					if ($sql) {

						error_reporting(0); //No mostrar errores de php.ini

						//Load Composer's autoloader
						require '../phpMailer/Exception.php';
						require '../phpMailer/PHPMailer.php';
						require '../phpMailer/SMTP.php';


						$password = $clave_natural;
						$nom = $nombre;
						$correo = $email;


						$mail = new PHPMailer(true);


						//Server settings
						// $mail->SMTPDebug = 0;
						$mail->isSMTP();
						$mail->Host = 'smtp.gmail.com';
						$mail->SMTPAuth = true;
						$mail->Username = 'solucionsolcomercial@gmail.com';
						$mail->Password = 'rcoxzhhydqwryqnq';
						$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
						$mail->Port = 465;

						//Recipients
						$mail->setFrom('solucionsolcomercial@gmail.com', 'Solcomercial');
						$mail->addAddress($correo);

						//Content
						$mail->isHTML(true);
						$mail->Subject = 'Bienvenid@ a Solcomercial';
						$mail->Body = 'Cordial saludo de parte del equipo de Solcomercial.<br/><br/>

            Se??or(a) <b>' . $nom . '.</b><br/><br/><br/>
                Queremos darte la bienvenida a nuestra empresa "Solcomercial".<br/><br/>

                Tu registro fue exitoso y te recordamos tus datos de acceso, los cuales son:<br/><br/>

                E-mail: <b>' . $correo . '</b><br/>

                Contrase??a: <b>' . $password . '</b><br/><br/>

                Ya est??s listo para dar lo mejor de t?? y crecer en nuestar compa??ia...!!!
				
				';


						$mail->send();
					?>

						<script>
							Swal.fire({
								title: 'Registro realizado con ??xito.!',
								text: "A tu bandeja de entrada de correo llegara un mensaje de bienvenida y recordaremos tus datos de registro.!",
								icon: 'success',
								confirmButtonColor: '#3085d6',
								confirmButtonText: 'Continuar'
							}).then((result) => {
								if (result.isConfirmed) {

									window.location = '../vistas/empleados_V.php';
								}
							})
						</script>
				<?php


					}
				}
				//---------------------------------- End validar usuario

			} else {
				?>
				<script>
					Swal.fire({
						title: 'Ooopss...!',
						text: "Las contrase??as no coinciden, por favor verifique e intente de nuevo.!",
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
					title: 'Ooopss...!',
					text: "Los correos no coinciden, por favor verifique e intente de nuevo.!",
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
	//Juego de registros de los premios creados

	$b_empleados = mysqli_query($conexion, "SELECT * FROM usuarios  WHERE nivel != 4 ORDER BY id_usuario;");
	$dataEmpleados = mysqli_fetch_assoc($b_empleados);