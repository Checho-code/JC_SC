<?php
require('../conexion/conexion.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require('escape.php');

//capturamos y escapamos todo lo que se envio por el formulario
if (!empty($_POST['btnRegistrar'])) {

	

	if (!empty($_POST["nombre_usuario"]) and !empty($_POST["apellido"]) and !empty($_POST["tipo-doc"]) and !empty($_POST["numero"]) and !empty($_POST["tel"]) and !empty($_POST["correo1"]) and !empty($_POST["correo2"]) and !empty($_POST["clave1"]) and !empty($_POST["clave2"])) {
		
		$nombre =  $_SESSION['nombre_usuario'] = htmlentities($_POST['nombre_usuario']);
		$apellido = $_SESSION['apellido'] = htmlentities($_POST['apellido']);
		$tipo_doc = $_SESSION['tipo-doc'] = htmlentities($_POST['tipo-doc']);
		$num_doc = $_SESSION['numero'] = htmlentities($_POST['numero']);
		$tel = $_SESSION['tel'] = htmlentities($_POST['tel']);
		$email = $_SESSION['correo1'] = htmlentities($_POST['correo1']);
		$email2 =$_SESSION['correo2'] = htmlentities( $_POST['correo2']);
		$clave_natural = $_SESSION['clave1'] = htmlentities($_POST['clave1']);
		$clave = password_hash($_POST['clave1'], PASSWORD_DEFAULT);
		$clave2 = $_POST["clave2"];
		$nivel = $_SESSION['nivel'] = 4;
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

            Señor(a) <b>' . $nom . '.</b><br/><br/><br/>
                Queremos darte la bienvenida a nuestra tienda virtual, por la cual podrás tener acceso a gran variedad de productos, y así ayudar a fortalecer el trabajo de muchos emprendedores y productores de nuestro país.<br/><br/>

                Tu registro fue exitoso y te recordamos tus datos de acceso, los cuales son:<br/><br/>

                E-mail: <b>' . $correo . '</b><br/>

                Contraseña: <b>' . $password . '</b><br/><br/>

                Ya estás listo para realizar tu primer pedido y empezar a acumular por cada compra que realices,
                 y redimir entre una gran cantidad de premios y obsequios que tenemos para ti.';


						$mail->send();
					?>

						<script>
							Swal.fire({
								title: 'Registro realizado con éxito.!',
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
				//---------------------------------- End validar usuario

			} else {
				?>
				<script>
					Swal.fire({
						title: 'Ooopss...!',
						text: "Las contraseñas no coinciden, por favor verifique e intente de nuevo.!",
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
