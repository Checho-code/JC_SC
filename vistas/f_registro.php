<!doctype html>
<html lang="es">

<head>
<link rel="shortcut icon" href="../img/sistema/logo.ico">
  <meta charset="utf-8">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="../mis_css/registro.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script rel="stylesheet" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
  
	<title>Registro | SolComercial</title>


</head>

<body>
	<!--Form registro-->
	<div class="container cont_ppal">

		<form class="row form_regis needs-validation" novalidate method="post" id="registro">

			<div class="cont-img col-12">
				<a href="../index.php"><img src="../img/sistema/logo.png" alt="Solcomercial" class="logo" /></a>
			</div>
			<?php
			include('../controladores/registro.php');
			?>
			<div class="cont-img col-12">
				<h3 class="titulo">Formulario de registro </h3>
			</div>

			<div class="entradas col-6">
				<label for="nombres" class="form-label">Nombre *</label>
				<input required name="nomb" type="text" autofocus="autofocus" class="form-control" <?php if (isset($_REQUEST['nomb']) && $_REQUEST['nomb'] != ''): ?> value="<?php echo $_REQUEST['nomb']; ?>" <?php endif; ?>>
				<div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El nombre es requerido.
				</div>
			</div>

			<div class="entradas col-6">
				<label for="apellidos" class="form-label">Apellido *</label>
				<input required name="ape" type="text" class="form-control"<?php if (isset($_REQUEST['ape']) && $_REQUEST['ape'] != ''): ?> value="<?php echo $_REQUEST['ape']; ?>" <?php endif; ?> >
				<div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El apellido es requerido.
				</div>
			</div>

			<div class="entradas col-4">
			
						<label for="tipo-docs">Tipo documento *</label>
						<select class="tip-doc form-control" name="tip-doc">
							<option value="Cedula Ciudadania">Ced.Ciudadania</option>
							<option value="Cedula Extranjeria">Ced.Extranjeria</option>
							<option value="Pasaporte">Pasaporte</option>
						</select>
					
				<div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El tipo es requerido.
				</div>
			</div>

			<div class="entradas col-4">
				<label for="num-docs" class="form-label">Número docuemnto *</label>
				<input required name="num" type="number" class="form-control" <?php if (isset($_REQUEST['num']) && $_REQUEST['num'] != ''): ?> value="<?php echo $_REQUEST['num']; ?>" <?php endif; ?>>
				<div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El numero es requerido.
				</div>
			</div>

			<div class="entradas col-4">
				<label for="num-tel" class="form-label">Número telefono *</label>
				<input required name="tel" type="number" class="form-control" <?php if (isset($_REQUEST['tel']) && $_REQUEST['tel'] != ''): ?> value="<?php echo $_REQUEST['tel']; ?>" <?php endif; ?>>
				<div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El telefono es requerido.
				</div>
			</div>


			<div class="entradas col-6">
				<label for="correo1s" class="form-label">Correo *</label>
				<input required type="email" name="corr" class="form-control" <?php if (isset($_REQUEST['corr']) && $_REQUEST['corr'] != ''): ?> value="<?php echo $_REQUEST['corr']; ?>" <?php endif; ?>>
				<div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El correo es requerido.
				</div>
			</div>

			<div class="entradas col-6">
				<label for="correo2s" class="form-label">Repetir correo *</label>
				<input required type="email" name="corr1" class="form-control" <?php if (isset($_REQUEST['corr1']) && $_REQUEST['corr1'] != ''): ?> value="<?php echo $_REQUEST['corr1']; ?>" <?php endif; ?>>
				<div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El correo es requerido.
				</div>
			</div>

			<div class="entradas col-6">
				<label for="clave1s" class="form-label">Contraseña *</label>
				<div class="input-group ">
					<input required type="password" class="form-control" name="cla1" id="password" <?php if (isset($_REQUEST['cla1']) && $_REQUEST['cla1'] != ''): ?> value="<?php echo $_REQUEST['cla1']; ?>" <?php endif; ?>>
					<span class=" input-group-text" id="basic-addon2"><i class="fa-solid fa-eye" id="eye"></i></span>
					<div class="valid-feedback">
						OK
					</div>
					<div class="invalid-feedback">
						Contraseñas requeridas e iguales
					</div>
				</div>
			</div>

			<div class="entradas col-6">
				<label for="clave2s" class="form-label">Repetir Contraseña *</label>
				<div class="input-group ">
					<input required type="password" class="form-control" name="cla2" id="password1" <?php if (isset($_REQUEST['cla2']) && $_REQUEST['cla2'] != ''): ?> value="<?php echo $_REQUEST['cla2']; ?>" <?php endif; ?>>
					<span class=" input-group-text" id="basic-addon2"><i class="fa-solid fa-eye" id="eye1"></i></span>
					<div class="valid-feedback">
						OK
					</div>
					<div class="invalid-feedback">
						Contraseñas requeridas e iguales.
					</div>
				</div>
			</div>

			<div class="term-cond col-12">
				<label class="form-label acepto" for="contrato">Acepto el <a href="contrato.html" target="_blanck"
						class="link1">Contrato</a>*</label>
				<input  name="checkbox" type="checkbox" required="required" id="checkbox" class="checkbox ">
				<div class="valid-feedback ok">
					OK
				</div>
				<div class="invalid-feedback ok">
					El check es requerido.
				</div>
			</div>

			<div class="botonera col-12">
				<a href="login.php" class="btn-cancel">Cancelar</a>
				<input type="submit" class="btn-reg" name="btn-R" value="Registrar">
			</div>


		</form>

	</div>





	<script type="text/javascript" src="../js/ver_password-reg.js"></script>
	<link rel="stylesheet" href="../js/js_bootstrap/bootstrap.bundle.min.js">


	<script type="text/javascript">
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(() => {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		const forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.from(forms).forEach(form => {
		form.addEventListener('submit', event => {
		if (!form.checkValidity()) {
		event.preventDefault()
		event.stopPropagation()
		}

		form.classList.add('was-validated')
		}, false)
		})
		})()
		</script>
</body>

</html>