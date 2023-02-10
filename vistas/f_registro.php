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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
	<title>Registro | SolComercial</title>


</head>

<body>
	<!--Form registro-->
	<div class="container cont_ppal">

		<form class="row form_regis needs-validation" novalidate method="post" id="registro">

			<div class="cont-img col-12">
				<a href="../index.php"><img src="../img/sistema/logo.png" alt="Solcomercial" class="logo" title="Regresar a Menu Principal"/></a>
			</div>
			
			<div class="cont-img col-12">
				<h3 class="titulo">Formulario de registro </h3>
			</div>

			<div class="entradas col-6">
				<label for="nombres" class="form-label">Nombre *</label>
				<input  name="nombre" type="text" autofocus="autofocus" class="form-control" <?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != ''): ?> value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
				<!-- <div class="valid-feedback">
					OK
				</div>
				<div class="invalid-feedback">
					El nombre es requerido.
				</div> -->
			</div>

			<div class="entradas col-6">
				<label for="apellidos" class="form-label">Apellido *</label>
				<input required name="apellido" type="text" class="form-control"<?php if (isset($_REQUEST['apellido']) && $_REQUEST['apellido'] != ''): ?> value="<?php echo $_REQUEST['apellido']; ?>" <?php endif; ?> >
				
			</div>

			<div class="entradas col-4">
			
						<label for="tipo-docs">Tipo documento *</label>
						<select class="tip-doc form-control" name="tipo-doc">
							<option value="Cedula Ciudadania">Ced.Ciudadania</option>
							<option value="Cedula Extranjeria">Ced.Extranjeria</option>
							<option value="Pasaporte">Pasaporte</option>
						</select>
			</div>

			<div class="entradas col-4">
				<label for="num-docs" class="form-label">Número docuemnto *</label>
				<input required name="numero" type="number" class="form-control" <?php if (isset($_REQUEST['numero']) && $_REQUEST['numero'] != ''): ?> value="<?php echo $_REQUEST['numero']; ?>" <?php endif; ?>>
				
			</div>

			<div class="entradas col-4">
				<label for="num-tel" class="form-label">Número telefono *</label>
				<input required name="tel" type="number" class="form-control" <?php if (isset($_REQUEST['tel']) && $_REQUEST['tel'] != ''): ?> value="<?php echo $_REQUEST['tel']; ?>" <?php endif; ?>>
				
			</div>


			<div class="entradas col-6">
				<label for="correo1s" class="form-label">Correo *</label>
				<input required type="email" name="correo1" class="form-control" <?php if (isset($_REQUEST['correo1']) && $_REQUEST['correo1'] != ''): ?> value="<?php echo $_REQUEST['correo1']; ?>" <?php endif; ?>>
				
			</div>

			<div class="entradas col-6">
				<label for="correo2s" class="form-label">Repetir correo *</label>
				<input required type="email" name="correo2" class="form-control" <?php if (isset($_REQUEST['correo2']) && $_REQUEST['correo2'] != ''): ?> value="<?php echo $_REQUEST['correo2']; ?>" <?php endif; ?>>
				
			</div>

			<div class="entradas col-6">
				<label for="clave1s" class="form-label">Contraseña *</label>
				<div class="input-group ">
					<input required type="password" class="form-control" name="clave1" id="password" <?php if (isset($_REQUEST['clave1']) && $_REQUEST['clave1'] != ''): ?> value="<?php echo $_REQUEST['clave1']; ?>" <?php endif; ?>>
					<span class=" input-group-text" id="basic-addon2"><i class="fa-solid fa-eye" id="eye"></i></span>
					
				</div>
			</div>

			<div class="entradas col-6">
				<label for="clave2s" class="form-label">Repetir Contraseña *</label>
				<div class="input-group ">
					<input required type="password" class="form-control" name="clave2" id="password1" <?php if (isset($_REQUEST['clave2']) && $_REQUEST['clave2'] != ''): ?> value="<?php echo $_REQUEST['clave2']; ?>" <?php endif; ?>>
					<span class=" input-group-text" id="basic-addon2"><i class="fa-solid fa-eye" id="eye1"></i></span>
					
				</div>
			</div>

			<div class="term-cond col-12">
				<label class="form-label acepto" for="contrato">Acepto el <a href="contrato.html" target="_blanck"
						class="link1">Contrato</a>*</label>
				<input  name="checkbox" type="checkbox" required="required" id="checkbox" class="checkbox ">
				
			</div>

			<div class="botonera col-12">
				<a href="login.php" class="btn-cancel">Cancelar</a>
				<input type="submit" class="btn-reg" name="btnRegistrar" value="Registrar">
			</div>


		</form>
	</div>

		<?php
			include('../controladores/registro.php');
			?>




	<script type="text/javascript" src="../js/ver_password-reg.js"></script>
	<link rel="stylesheet" href="../js/js_bootstrap/bootstrap.bundle.min.js">


</body>

</html>