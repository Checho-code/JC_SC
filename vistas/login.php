<!doctype html>
<html lang="es">

<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="shortcut icon" href="../img/sistema/logo.ico">
  <meta charset="utf-8">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="../mis_css/login.css">
  <link rel="stylesheet" href="../util/bootstrap.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script rel="stylesheet" src="../util/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.js"></script>
  <title>Login |SolComercial</title>


</head>

<body>
  <!-- Formulario login -->
  <div class="container cont_ppal">

    <form class="row form_login" method="post" action="">

      <div class="cont-img ">
        <img src="../img/sistema/logo.png" alt="Solcomercial" class="logo" />
      </div>
      <?php
      include('../controladores/inicio_sesion.php');
      ?>
      <div class="cont-img">
        <h3 class="titulo">Iniciar Sesión </h3>
      </div>

      <div class="entradas col-9">
        <label for="correo" class="form-label">E-mail</label>
        <input class="form-control " type="email" name="user" placeholder="Ej micorreo@algo.com" <?php if (isset($_REQUEST['user']) && $_REQUEST['user'] != ''): ?> value="<?php echo $_REQUEST['user']; ?>" <?php endif; ?>>
      </div>

      <div class="entradas col-9">
        <label for="clave" class="form-label">Contraseña </label>
        <input class="form-control" type="password" name="pass" placeholder="Ingrese su contraseña" id="password">
        <img src="../icon/ver.png" class="icon" id="eye">
      </div>


      <div class="olvido col-10 mb-3">
        <a href="recuperar_clave.php" class="link">¿Olvidó su contraseña?</a>
      </div>

      <div class="botonera col-12 p-2 ">
        <a href="f_registro.php" class="btn-registro">Registrarme</a>
        <button type="submit" name="btn-login" value="ok" class="btn-ingreso">Ingresar</button>
      </div>

    </form>


  </div>


  <script type="text/javascript" src="../js/ver_password-login.js"></script>


</body>

</html>