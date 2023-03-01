<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
  <title>Noticias | Solcomercial</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
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


    $sqlNoticia = ("SELECT * FROM noticias ORDER BY id_noticia");
    $queryNoticia = mysqli_query($conexion, $sqlNoticia);
    $cantidad = mysqli_num_rows($queryNoticia);
    ?>


    <h4 style="color: #177c03; text-align: center;">
      Formulario de manejo de Noticias
    </h4>



    <div class="row text-center mt-4" style="background-color: #cecece">
      <div class="col-md-4">
        <strong>Registrar Nueva Noticia</strong>
      </div>
      <div class="col-md-8">
        <strong>Lista de Noticias <span style="color: crimson"> (
            <?php echo $cantidad; ?> )
          </span> </strong>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">

            <div class="col-sm-4">
              <!--- Formulario para registrar Noticia --->
              <?php include('../controladores/crear_noticia_C.php') ?>
              <form method="post" enctype="multipart/form-data">

                <div class="form-group mt-4">
                  <label for="titulo">Titulo de la noticia *</label>
                  <input type="text" name="titulo" autocomplete="off" class="form-control"
                    placeholder="Titulo de la noticia" />
                </div>

                <div class="form-group mt-5 mb-5">
                  <label for="noticia">Noticia *</label>
                  <textarea name="noticia" class="form-control" placeholder="Escriba aquí su publicacion"></textarea>
                </div>

                <div class="input-group mt-5 mb-5">
                  <label for="imagen">Seleccione la imagen de la noticia *</label>
                  <input type="file" name="imagen" class="form-control-file"
                    accept="image/jpeg, image/jpg, image/png, image/gif" lang="es">
                </div>

                <div class="form-group mt-5 mb-5">
                  <label for="tipo-docs">Estado *</label>
                  <select class="tip-doc form-control" name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>

                <div class="form-group mt-5 mb-5">
                  <input type="submit" name="btnGuardar" value="Guardar" class="btn"
                    style="background-color: #177c03; color:#ffffff">
                  <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>
                </div>

              </form>

            </div>



            <div class="col-sm-8">
              <div class="row mt-3">
                <div class="col-md-12 p-2">


                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Publicado</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Noticia</th>
                          <th scope="col">Estado</th>
                          <th scope="col">imagen</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        do { ?>
                          <tr>
                            <td>
                              <?php echo $dataNoticias['id_noticia']; ?>
                            </td>
                            <td>
                              <?php echo $dataNoticias['fecha_publicacion']; ?>
                            </td>
                            <td>
                              <?php echo $dataNoticias['titulo']; ?>
                            </td>
                            <td>
                              <?php echo $dataNoticias['noticia']; ?>
                            </td>
                            <td>
                              <?php $est = $dataNoticias['estado'];
                              echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Activo </p>' : '<p style="color:red; font-weight:700; ">Inactivo </p>' ?>
                            </td>

                            <td><img src="../images/img_noticias/<?php echo $dataNoticias['imagen']; ?>" width="100"
                                height="100" /></td>
                            <td>
                              <div class=" container-fluid">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                  data-target="#deleteChildresn<?php echo $dataNoticias['id_noticia']; ?>">
                                  <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <br>
                                <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                  data-target="#editChildresn<?php echo $dataNoticias['id_noticia']; ?>">
                                  <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>


                        <!--Ventana Modal para Actualizar--->
                        <?php include('mod/ModalEditarN.php'); ?>

                        <!--Ventana Modal para la Alerta de Eliminar--->
                        <?php include('mod/ModalEliminarN.php'); ?>


                      <?php } while ($dataNoticias = mysqli_fetch_assoc($buscar_noticias)); ?>

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

  <h5 style="color: #177c03; text-align: center;">Video Frutos del campo </h5>
  <br>

  <div class="video">
    <iframe width="860" height="415" src="https://www.youtube.com/embed/x8hEbhePSF4" title="YouTube video player"
      frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen></iframe>
  </div>
  <br><br>

  <br>
  <br>
  <br>
  <!---------------- Footer --------------->
  <?php include('../vistas/footer.php') ?>

  <script src="../js/jquery-3.6.3.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {

      $('.btnBorrarN').click(function (e) {
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'id=' + id;
        // alert (id + '--' +dataString);
        url = "mod/BorrarN.php";
        $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          success: function (data) {
            window.location.href = "noticias_V.php";
            $('#respuesta').html(data);
          }

        });
        return false;

      });


    });
  </script>

</body>

</html>