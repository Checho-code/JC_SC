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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet"  href="../mis_css/recuperarClave.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title> Recuperar clave | Solcomercial </title> 
  
</head>

<body>

<div class="cont_ppal">
  <div class="form_recuperar">
    <div class="cont-img">
      <img src="../img/sistema/logo.png" alt="Solcomercial" class="logo"/>
      </div>

      <form class="cont_form"  method="post" action="">
        <div class="tabla">
          <h5 class="text-danger bg-dark text-center">OJO falta configuarar envio de correo</h5>
        <?php
          // include "../controladores/recuperar.php";
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
  
  <script type="text/javascript" src="../js/jquery-3.6.3.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</body>
</html>

  