<!doctype html>
<html lang="es">

<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="shortcut icon" href="../img/sistema/logo.ico">
  <meta charset="utf-8">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!--<meta name="robots" content="noindex">-->
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet"  href="../mis_css/recuperarClave.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Solcomercial | Recuperar clave</title> 
  
</head>

<body>

<div class="cont_ppal">
  <div class="form_recuperar">
    <div class="cont-img">
      <img src="../img/sistema/logo.png" alt="Solcomercial" class="logo"/>
      </div>

      <form class="cont_form"  method="post" action="">
        <div class="tabla">
        <?php
          include "../controladores/recuperar.php";
          ?>
          <div class="entradas ">
            <label for="correo">Numero de Documento</label>
            <input type="number" name="num-doc" placeholder="Ej: 00112233" class="user">
          </div>
          
          
          <div class="botonera">
            <a href="login.php" class="btn-cancel">Cancelar</a>
            <input type="submit" name="enviar" value="Enviar" class="btn-enviar">
          </div>
        </div>
        
      </form>
      
    </div>
  </div>
  
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</body>
</html>

  