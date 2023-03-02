
<!doctype html>
<html lang="es">

<head>
  <link rel="shortcut icon" href="../img/sistema/logo.ico">
  <meta charset="utf-8">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../mis_css/login.css">
  
  <title>Login |SolComercial</title>


</head>

<body>
  <!-- Formulario login -->
  <div class="container cont_ppal">

    <form class="row form_login"  action="" method="POST">
    
      <div class="cont-img col-12">
      <a href="../index.php"><img src="../img/sistema/logo.png" alt="Solcomercial" class="logo" title="Regresar a Menu Principal" /></a>
      </div>
      <?php include ('../controladores/inicio_sesion_C.php')?>
      <div class="cont-img col-12">
        <h3 class="titulo">Iniciar Sesión </h3>
      </div>

      <div class="entradas col-9">
        <label for="correo" class="form-label">E-mail</label>
        <input class="form-control " type="email" name="user" placeholder="Ej: micorreo@algo.com" <?php if (isset($_REQUEST['user']) && $_REQUEST['user'] != ''): ?> value="<?php echo $_REQUEST['user']; ?>" <?php endif; ?>>
      </div>

      <div class="entradas col-9">
				<label for="clave" class="form-label">Contraseña</label>
				<div class="input-group ">
					<input type="password" class="form-control" name="pass" id="password" placeholder="Ingrese su contraseña">
					<span class=" input-group-text" id="basic-addon2"><i class="fa-solid fa-eye" id="eye"></i></span>

      <div class="olvido col-10 mb-3">
        <a href="recuperar_clave.php" class="link">Recuperar contraseña</a>
      </div>

      <div class="botonera col-12 p-2 ">
        <a href="f_registro.php" class="btn-registro" >Registrarme</a>
        <button type="submit" name="btnLogin" value="ok" class="btn-ingreso">Ingresar</button>
      </div>

    </form>


  </div>


  <script type="text/javascript" src="../js/ver_password-login.js"></script>
  <script type="text/javascript" src="../js/jquery-3.6.3.min.js"></script>

  

</body>

</html>