<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
include '../controladores/crear_producto_C.php';
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
  <title>Productos | Solcomercial</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
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
  <?php
  include '../conexion/conexion.php';


  $sqlProd = ("SELECT * FROM productos ORDER BY id_producto");
  $queryProd = mysqli_query($conexion, $sqlProd);
  $cantidad = mysqli_num_rows($queryProd);
  ?>


  <!---------------- Formulario Registro --------------->

  <div class="container mt-5">
    <h4 style="color: #177c03; text-align: center;" class="mb-3">
      Formulario de manejo de Productos
    </h4>
    <div class="row text-center mt-5 mb-5" style="background-color: #cecece">
      <div class="col-md-12 text-center ">
        <strong>Registrar Nuevo Producto</strong>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <!--- Formulario para registrar Productos --->

              <form method="post" enctype="multipart/form-data"
                style="background-color: #f7f7f7;border-radius: 20px; padding: 16px; ">

                <div class="row justify-content-around mt-3 p-2">

                  <div class="col-5">
                    <label for="destacado">Marca *</label>
                    <select class="form-control" name="marca" required>
                      <option selected>Seleccionar</option>
                      <!-- Codigo para llenar select con BD -->
                      <?php
                      $sqlM = ("SELECT * FROM marcas");
                      if ($res = mysqli_query($conexion, $sqlM)) {
                        $cant = mysqli_num_rows($res);
                        if ($cant > 0) {
                          while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                            echo '<option value="' . $row['id_marca'] . '">' . $row['nom_marca'] . '</option>';
                          }
                        }
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-5">
                    <label for="destacado">Categoria *</label>
                    <select class="form-control" name="categoria" required>
                      <option selected>Seleccionar</option>
                      <!-- Codigo para llenar select con BD -->
                      <?php
                      $sqlC = ("SELECT * FROM categorias");
                      if ($resC = mysqli_query($conexion, $sqlC)) {
                        $cantC = mysqli_num_rows($resC);
                        if ($cantC > 0) {
                          while ($row = mysqli_fetch_array($resC, MYSQLI_ASSOC)) {
                            echo '<option value="' . $row['id_categoria'] . '">' . $row['nom_categoria'] . '</option>';
                          }
                        }
                      }
                      ?>

                    </select>
                  </div>
                </div>

                <div class="row justify-content-around  mt-3 p-2">
                  <div class="col-5">
                    <label for="nombre producto">Nombre producto *</label>
                    <input name="nombre" required type="text" class="form-control" placeholder="Ingrese nombre del producto"
                      autocomplete="off">
                  </div>

                  <div class="col-5">
                    <label for="precios">Precio *</label>
                    <input type="text" maxlength="6" name="precio" placeholder="Ingrese precio de venta"
                      class="form-control" required autocomplete="off"
                      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" />
                  </div>

                </div>

                <div class="row justify-content-around  mt-3 p-2">
                  <div class="col-5">
                    <label for="unidads">Unidad *</label>
                    <input name="unidad" required type="text" class="form-control" placeholder="Ejm: Kilo, Libra, Unidad....."
                      autocomplete="off">
                  </div>

                  <div class="col-5">
                    <label for="porcentajes">Porcentaje *</label>
                    <select class="form-control" required name="porcentaje">
                      <option selected>Seleccionar</option>
                      <?php for ($i = 10.0; $i >= 0.5; $i -= 0.5) {
                        echo '<option value="' . $i . '"> ' . $i . '</option>';
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="row justify-content-around  mt-3 p-2">
                  <div class="col-5">
                    <label for="descripcions">Descripción *</label>
                    <textarea name="descripcion" required type="text" class="form-control"
                      placeholder="Ingrese una descripcion corta" autocomplete="off"></textarea>
                  </div>

                  <div class="col-5">
                    <label for="estados">Estado *</label>
                    <select class="form-control" required name="estado">
                      <option value="Disponible">Disponible</option>
                      <option value="No disponible">No disponible</option>
                    </select>
                  </div>
                </div>

                <div class="row justify-content-around  mt-3 p-2">
                  <div class="col-5">
                    <label for="destacado">Destacar *</label>
                    <select class="form-control" required name="destacado">
                      <option value="1">Si</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                  <div class="col-5">
                    <label for="imagen">Seleccione la imagen del producto</label>
                    <input type="file" required name="imagen" class="form-control-file"
                      accept="image/jpeg, image/jpg, image/png, image/gif, image/webp" lang="es">
                  </div>
                </div>
                <br>
                <br>


                <div class="row justify-content-around mt-3 p-2">
                  <div class="botonera col-5">
                    <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>
                  </div>
                  <div class="botonera col-5">

                    <input type="submit" name="btnGuardar" value="Guardar" class="btn"
                      style="background-color: #177c03; color:#ffffff">

                  </div>
                </div>


              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <br>
  <hr>
  <!-------------- Tabla de registros --------------->
  <div class="container mt-5">

    <div class="row text-center mt-2" style="background-color: #cecece">
      <div class="col-md-12">
        <strong>Lista de Productos <span style="color: crimson"> (
            <?php echo $cantidad; ?> )
          </span> </strong>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row mt-3">
        <div class="col-md-12 p-2">


          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Unidad</th>
                  <th scope="col">%</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Imagen</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Destacar</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                do { ?>
                  <tr>
                    <td>
                      <?php echo $dataProduct['id_producto']; ?>
                    </td>
                    <td>
                      <?php echo $dataProduct['nom_producto']; ?>
                    </td>
                    <td>
                      <?php echo $dataProduct['precio']; ?>
                    </td>
                    <td>
                      <?php echo $dataProduct['unidad']; ?>
                    </td>
                    <td>
                      <?php echo $dataProduct['porcentaje']; ?>
                    </td>
                    <td>
                      <?php echo $dataProduct['descripcion']; ?>
                    </td>
                    <td><img src="../images/img_productos/<?php echo $dataProduct['imagen']; ?>" width="100"
                        height="100" />
                    </td>
                    <td>
                      <?php $est = $dataProduct['estado'];
                      echo ($est === 'Disponible') ? '<p style="color:green;font-weight:700; ">' . $est . '</p>' : '<p style="color:red; font-weight:700; ">' . $est . '</p>' ?>
                    </td>

                    <td>
                      <?php $est = $dataProduct['destacado'];
                      echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Si </p>' : '<p style="color:red; font-weight:700; ">No</p>' ?>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#deleteChildresn<?php echo $dataProduct['id_producto']; ?>">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>

                      <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#editChildresn<?php echo $dataProduct['id_producto']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>


                <!--Ventana Modal para Actualizar--->
                <?php include('mod/ModalEditarProdts.php'); ?>

                <!--Ventana Modal para la Alerta de Eliminar--->
                <?php include('mod/ModalEliminarProdts.php'); ?>


              <?php } while ($dataProduct = mysqli_fetch_assoc($b_productos)); ?>

            </table>
          </div>


        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <br>



  <!---------------- Footer --------------->
  <?php include('../vistas/footer.php') ?>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {

      $('.btnBorrar').click(function (e) {
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'id=' + id;
        // alert (id + '--' +dataString);
        url = "mod/BorrarProdts.php";
        $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          success: function (data) {
            window.location.href = "productos_V.php";
            $('#respuesta').html(data);
          }

        });
        return false;

      });


    });
  </script>

</body>

</html>