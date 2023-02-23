<!doctype html>
<html lang="es">

<head>
	<link rel="shortcut icon" href="../img/sistema/logo.ico">
	<meta charset="utf-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script rel="stylesheet" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../mis_css/registro.css">
	<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>


	<title>Registro | SolComercial</title>


</head>

<body>
	<!--Form registro-->
	<div class="container-fluid mt-5 w-75">

		<form class="row form_regis needs-validation" novalidate method="post" id="registro">

			<div class="cont-img col-12">
				<a href="../index.php"><img src="../img/sistema/logo.png" alt="Solcomercial" class="logo" title="Regresar a Menu Principal" /></a>
			</div>

			<div class="cont-img col-12">
				<h3 class="titulo">Formulario de registro </h3>
			</div>


			<div class="row justify-content-around mt-3 p-2">

				<div class="col-5">
					<label for="nombres" class="label">Nombre *</label>
					<input name="nombre_usuario" type="text" autofocus="autofocus" class="form-control" <?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != '') : ?> value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
				</div>

				<div class="col-5">
					<label for="apellidos" class="label">Apellido *</label>
					<input required name="apellido" type="text" class="form-control" <?php if (isset($_REQUEST['apellido']) && $_REQUEST['apellido'] != '') : ?> value="<?php echo $_REQUEST['apellido']; ?>" <?php endif; ?>>
				</div>
			</div>


			<div class="row justify-content-around  mt-3 p-2">

				<div class="col-3">
					<label for="tipo-docs" class="label">Tipo documento *</label>
					<select class="tip-doc form-control " name="tipo-doc">
						<option value="Cedula Ciudadania">Ced.Ciudadania</option>
						<option value="Cedula Extranjeria">Ced.Extranjeria</option>
						<option value="Pasaporte">Pasaporte</option>
					</select>
				</div>

				<div class="col-3">
					<label for="num-docs" class="label">Num. docuemnto *</label>
					<input required name="numero" type="number" class="form-control" <?php if (isset($_REQUEST['numero']) && $_REQUEST['numero'] != '') : ?> value="<?php echo $_REQUEST['numero']; ?>" <?php endif; ?>>
				</div>

				<div class="col-3">
					<label for="num-tel" class="label">Num. telefono *</label>
					<input required name="tel" type="number" class="form-control" <?php if (isset($_REQUEST['tel']) && $_REQUEST['tel'] != '') : ?> value="<?php echo $_REQUEST['tel']; ?>" <?php endif; ?>>
				</div>

			</div>

			<div class="row justify-content-around mt-3 p-2">

				<div class="col-5">
					<label for="correo1s" class="label">Correo *</label>
					<input required type="email" name="correo1" class="form-control " <?php if (isset($_REQUEST['correo1']) && $_REQUEST['correo1'] != '') : ?> value="<?php echo $_REQUEST['correo1']; ?>" <?php endif; ?>>
				</div>

				<div class="col-5">
					<label for="correo2s" class="label">Repetir correo *</label>
					<input required type="email" name="correo2" class="form-control " <?php if (isset($_REQUEST['correo2']) && $_REQUEST['correo2'] != '') : ?> value="<?php echo $_REQUEST['correo2']; ?>" <?php endif; ?>>
				</div>

			</div>


			<div class="row justify-content-around mt-3 p-2">

				<div class="col-5">
					<label for="clave1s" class="label">Contraseña *</label>
					<div class="input-group ">
						<input required type="password" class="form-control" name="clave1" id="password" <?php if (isset($_REQUEST['clave1']) && $_REQUEST['clave1'] != '') : ?> value="<?php echo $_REQUEST['clave1']; ?>" <?php endif; ?>>

					</div>
				</div>

				<div class="col-5">
					<label for="clave2s" class="label">Repetir Contraseña *</label>
					<div class="input-group ">
						<input required type="password" class="form-control" name="clave2" id="password1" <?php if (isset($_REQUEST['clave2']) && $_REQUEST['clave2'] != '') : ?> value="<?php echo $_REQUEST['clave2']; ?>" <?php endif; ?>>

					</div>
				</div>

			</div>
			<div class="row justify-content-around mt-4 m-0 p-2">

				<div class="chk col-5">
					<input name="checkbox" type="checkbox" required="required" id="checkbox" class="checkbox ">
				</div>

				<div class="acep col-7">
					<label class="acepto" for="contrato">Acepto el <a href="contrato.html" target="_blanck" class="link1">Contrato</a>*</label>
				</div>

			</div>

			<div class="row justify-content-around mt-3 p-2">
				<div class="botonera col-3">
					<a href="login.php" class="btn-cancel">Cancelar</a>
				</div>
				<div class="botonera col-3">
					<input type="submit" class="btn-reg" name="btnRegistrar" value="Registrar">
				</div>

			</div>

		</form>
	</div>

	<?php
	include('../controladores/registro_C.php');
	?>




	<script type="text/javascript" src="../js/ver_password-reg.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>


</body>

</html>