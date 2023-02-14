<?php
require('../conexion/conexion.php');

//Busco el registro  del usuario para determinar si ya tiene intentos

if (!empty($_POST["btnLogin"])) {
	session_start();


	error_reporting(0);

	$intentos = '';
	$usuario = $_SESSION['user'] = htmlentities($_POST['user']);
	$clave = $_SESSION['pass'] = htmlentities($_POST['pass']);

	if (!empty($_POST["user"]) and !empty($_POST["pass"])) {

		$buscar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$usuario'");
		$row_usuario = mysqli_fetch_assoc($buscar_usuario);
		if ($row_usuario >= 1) {

			$intentos = $row_usuario['intentos'];

			if (password_verify($clave, $row_usuario['clave'])) {
				$_SESSION['id_usuario'] = $row_usuario['id_usuario'];
				$_SESSION['mombre'] = $row_usuario['nombre_usuario'];
				$_SESSION['tipo-doc'] = $row_usuario['tipo_doc'];
				$_SESSION['numero'] = $row_usuario['num_doc'];
				$_SESSION['dpto'] = $row_usuario['id_depto'];
				$_SESSION['ciudad'] = $row_usuario['id_ciudad'];
				$_SESSION['sector'] = $row_usuario['id_sector'];
				$_SESSION['direccio'] = $row_usuario['direccion'];
				$_SESSION['nivel'] = $row_usuario['nivel'];
				$_SESSION['clave_maestra'] = '963852';
				setcookie("email", $row_usuario['email'], time() + 30 * 24 * 60 * 60);
				setcookie("clave", $clave, time() + 30 * 24 * 60 * 60);
				mysqli_query($conexion, "UPDATE usuarios SET intentos=0 WHERE email='$usuario'");
				
				$_SESSION['datosU'] = $row_usuario;
				switch ($_SESSION['nivel']) {
					case '1':
						header('location: ../vistas/menuRepartidor.php');
						break;
					case '2':
						header('location: ../vistas/menuVendedor.php');
						break;
					case '3':
						header('location: ../vistas/menuAdmin.php');
						break;
					case '4':
						header('location: ../vistas/menuCliente.php');
						break;
				}
			} else {
				$intentos++;
				mysqli_query($conexion, "UPDATE usuarios SET intentos=$intentos WHERE email='$usuario'");

				if ($intentos >= 5) {
					session_start();
					session_destroy();
					header('Location: cuenta_bloqueada');
				} else {
?>
					<script>
						Swal.fire({
							icon: 'question',
							title: 'Oops...',
							text: 'Contraseña incorrecta, verifica nuevamente, si haz olvidado tu contraseña, ve a la opción “Recuperar Contraseña”!',
							confirmButtonColor: '#177c03',

						})
					</script>
			<?php
				}
			}
		} else {
			?>
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Lo sentimos el correo que ingresaste no ha sido registrado, verifícalo nuevamente y vuelve a intentarlo.!',
					confirmButtonColor: '#177c03',

				})
			</script>
		<?php
		}
	} else { ?>
		<script>
			Swal.fire({
				icon: 'info',
				title: 'Oops...',
				text: 'Lo sentimos, debes completar todos los campos para realizar el ingreso, vuelve a intentarlo!',
				confirmButtonColor: '#177c03',
			})
		</script>
<?php
	}
}
