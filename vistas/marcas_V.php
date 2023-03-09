<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';

error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
  <title>Marcas | Solcomercial</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
  <style>
    .btnCarrito {
      visibility: hidden;
    }
  </style>

</head>

<body>

  <div class="container mt-5 ">

    <?php
    include '../conexion/conexion.php';


    $sqlMarca = ("SELECT * FROM marcas ORDER BY id_marca");
    $queryMarca = mysqli_query($conexion, $sqlMarca);
    $cantidad = mysqli_num_rows($queryMarca);
    ?>


    <h4 style="color: #177c03; text-align: center;">
      Formulario Manejo de Marcas
    </h4>
    <hr>


    <div class="row text-center" style="background-color: #cecece">
      <div class="col-md-6">
        <strong>Registrar Nueva Marca</strong>
      </div>
      <div class="col-md-6">
        <strong>Lista de Marcas <span style="color: crimson"> (
            <?php echo $cantidad; ?> )
          </span> </strong>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">

            <div class="col-sm-5">
              <!--- Formulario para registrar Marca --->
              <?php include('../controladores/crear_marca_C.php') ?>
              <form method="post" enctype="multipart/form-data">

                <div class="form-group mt-4">
                  <label for="nombre producto">Nombre marca *</label>
                  <input name="nombre_marca" type="text" class="form-control" placeholder="Ingrese nombre de la marca" autocomplete="off">
                </div>

                <div class="form-group mt-5 mb-5">
                  <label for="imagen">Seleccione la imagen de la marca</label>
                  <input type="file" name="foto" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif, image/webp" lang="es">
                </div>

                <div class="form-group mt-5 mb-5">

                  <label for="tipo-docs">Estado *</label>
                  <select class="tip-doc form-control" name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>
                <div class="form-group mt-5 mb-5">
                  <input type="submit" name="btnSaveMarca" value="Guardar" class="btn" style="background-color: #177c03; color:#ffffff">
                  <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>
                </div>


              </form>

            </div>



            <div class="col-sm-7">
              <div class="row mt-3">
                <div class="col-md-12 p-2">


                  <div class="table-responsive">
                    <table class="table table-bordered  table-hover">
                      <thead>
                        <tr>
                          <th style="background-color: #cecece; font-size: 0.85rem;">Id</th>
                          <th style="background-color: #cecece; font-size: 0.85rem;">Nombre
                          </th>
                          <th style="background-color: #cecece; font-size: 0.85rem;">Logo</th>
                          <th style="background-color: #cecece; font-size: 0.85rem;">Estado
                          </th>
                          <th style="background-color: #cecece; font-size: 0.85rem;">Acciones
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        do { ?>
                          <tr>
                            <td>
                              <?php echo $dataMarca['id_marca']; ?>
                            </td>
                            <td>
                              <?php echo $dataMarca['nom_marca']; ?>
                            </td>
                            <td><img src="../images/img_marcas/<?php echo $dataMarca['logo']; ?>" width="100" height="100" /></td>
                            <td>
                              <?php $est = $dataMarca['estado'];
                              echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Activo </p>' : '<p style="color:red; font-weight:700; ">Inactivo </p>' ?>
                            </td>

                            <td>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataMarca['id_marca']; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                              </button>

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataMarca['id_marca']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            </td>
                          </tr>
                      </tbody>


                      <!--Ventana Modal para Actualizar--->
                      <?php include('mod/ModalEditarM.php'); ?>

                      <!--Ventana Modal para la Alerta de Eliminar--->
                      <?php include('mod/ModalEliminarM.php'); ?>


                    <?php } while ($dataMarca = mysqli_fetch_assoc($b_marca)); ?>

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

      $('.btnBorrar').click(function(e) {
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'id=' + id;
        url = "mod/BorrarM.php";
        $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          success: function(data) {
            window.location.href = "marcas_V.php";
            $('#respuesta').html(data);
          }

        });
        return false;

      });


    });
  </script>

</body>

</html>