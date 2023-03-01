<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php'; 
//error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
  <title>Premios | Solcomercial</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />


</head>

<body>

  <div class="container mt-5 ">

    <?php
    include '../conexion/conexion.php';


    $sqlPremio   = ("SELECT * FROM premios ORDER BY id_premio");
    $queryPremio = mysqli_query($conexion, $sqlPremio);
    $cantidad     = mysqli_num_rows($queryPremio);
    ?>


    <h4 style="color: #177c03; text-align: center;">
      Formulario de manejo de premios
    </h4>
    


    <div class="row text-center" style="background-color: #cecece">
      <div class="col-md-6">
        <strong>Registrar Nuevo Premio</strong>
      </div>
      <div class="col-md-6">
        <strong>Lista de Premios <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">

            <div class="col-sm-5">
              <!--- Formulario para registrar Premios --->
              <?php include('../controladores/crear-premios_C.php') ?>
              <form method="post" enctype="multipart/form-data">

                <div class="form-group mt-4">
                  <label for="nombre_premio">Nombre del premio *</label>
                  <input type="text" name="nombre_premio" class="form-control" autocomplete="off" placeholder="Nombre del premio " />
                </div>
                
                <div class="form-group mt-5 mb-5">
                  <label for="puntos">Puntos necesarios *</label>
                  <input type="number" name="puntos" class="form-control" placeholder="Puntos requeridos" />
                </div>
                
                <div class="form-group mt-5 mb-5">
                  <label for="imagen">Seleccione la imagen del premio *</label>
                  <input type="file" name="imagen" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif, image/webp" lang="es">
                </div>
                
                <div class="form-group mt-5 mb-5">
                  <label for="tipo-docs">Estado *</label>
                  <select class="tip-doc form-control" name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
                <div class="form-group mt-5 mb-5">
                  <input type="submit" name="btnGuardarPremio" class="btn btn-primary" value="Crear premio" style="background-color: #177c03; color:#ffffff" />
                  <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>

                </div>


              </form>

            </div>



            <div class="col-sm-7">
              <div class="row mt-3">
                <div class="col-md-12 p-2">


                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Puntos</th>
                          <th scope="col">Imagen</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        do { ?>
                          <tr>
                            <td><?php echo $dataPremios['id_premio']; ?></td>
                            <td><?php echo $dataPremios['nombre_premio']; ?></td>
                            <td><?php echo $dataPremios['puntos']; ?></td>
                            <td><img src="../images/img_premios/<?php echo $dataPremios['imagen']; ?>" width="100" height="100" /></td>
                            <td><?php $est = $dataPremios['estado'];
                                echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Activo </p>' : '<p style="color:red; font-weight:700; ">Inactivo </p>' ?></td>

                            <td>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataPremios['id_premio']; ?>">
                              <i class="fa-solid fa-trash-can"></i>
                              </button>

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataPremios['id_premio']; ?>">
                              <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            </td>
                          </tr>
                      </tbody>


                      <!--Ventana Modal para Actualizar--->
                      <?php include('mod/ModalEditarP.php'); ?>

                      <!--Ventana Modal para la Alerta de Eliminar--->
                      <?php include('mod/ModalEliminarP.php'); ?>


                    <?php } while ($dataPremios = mysqli_fetch_assoc($b_premios)); ?>

                    </table>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <!---------------- Footer --------------->
  <?php include('../vistas/footer.php') ?>

  <script src="../js/jquery-3.6.3.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $('.btnBorrarP').click(function(e) {
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'id=' + id;
        // alert (id + '--' +dataString);
        url = "mod/BorrarP.php";
        $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          success: function(data) {
            window.location.href = "premios_V.php";
            $('#respuesta').html(data);
          }

        });
        return false;

      });


    });
  </script>

</body>

</html>