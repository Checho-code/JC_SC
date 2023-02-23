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
  <title>Empleados | Solcomercial</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
  <link rel="stylesheet" href="../mis_css/registroEmpl.css">



</head>

<body>

  <div class="container mt-5 ">

    <?php
    include '../conexion/conexion.php';


    $sqlEmpleado = ("SELECT * FROM usuarios WHERE nivel != 4 ORDER BY id_usuario ");
    $queryEmpleado = mysqli_query($conexion, $sqlEmpleado);
    $cantidad = mysqli_num_rows($queryEmpleado);
    ?>


    <h4 style="color: #177c03; text-align: center;" class="mb-5">
      Formulario de manejo de Empleados
    </h4>



    <div class="row text-center mt-5" style="background-color: #cecece">
      <div class="col-md-12 text-center">
        <strong>Registrar Nuevo Empleado</strong>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="body">
          <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <!--- Formulario para registrar Marca --->
              <?php include('../controladores/crear_empleado_C.php') ?>

              <form class="row form_regis needs-validation" novalidate method="post" id="registro">

                <div class="row justify-content-around mt-3 p-2">

                  <div class="col-5">
                    <label for="nombres" class="label">Nombre *</label>
                    <input name="nombre" type="text" autofocus="autofocus" class="form-control" <?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != '') : ?> value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
                  </div>

                  <div class="col-5">
                    <label for="apellidos" class="label">Apellido *</label>
                    <input required name="apellido" type="text" class="form-control" <?php if (isset($_REQUEST['apellido']) && $_REQUEST['apellido'] != '') : ?> value="<?php echo $_REQUEST['apellido']; ?>" <?php endif; ?>>
                  </div>
                </div>


                <div class="row justify-content-around  mt-3 p-2">

                  <div class="col-5">
                    <label for="tipo-docs" class="label">Tipo documento *</label>
                    <select class="tip-doc form-control " name="tipo-doc">
                      <option value="Id Empleado">Seleccione</option>
                      <option value="Id Empleado">ID Empleado</option>
                    </select>
                  </div>

                  <div class="col-5">
                    <label for="num-docs" class="label">Num. docuemnto *</label>
                    <input required name="numero" type="text" class="form-control" <?php if (isset($_REQUEST['numero']) && $_REQUEST['numero'] != '') : ?> value="<?php echo $_REQUEST['numero']; ?>" <?php endif; ?>>
                  </div>

                </div>

                <div class="row justify-content-around  mt-3 p-2">

                  <div class="col-5">
                    <label for="num-tel" class="label">Num. telefono *</label>
                    <input required name="tel" type="number" class="form-control" <?php if (isset($_REQUEST['tel']) && $_REQUEST['tel'] != '') : ?> value="<?php echo $_REQUEST['tel']; ?>" <?php endif; ?>>
                  </div>

                  <div class="col-5">
                    <label for="tipo-rol" class="label">Rol *</label>
                    <select required class="tipo-rol form-control " name="nivel">
                      <option ></option>
                      <option value="1">Repartidor</option>
                      <option value="2">Vendedor</option>
                      <option value="3">Administrador</option>
                    </select>
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


                <div class="row justify-content-around mt-3 p-2">
                  <div class="botonera col-5">
                    <a href="index-base.php" class="btn-cancel">Cancelar</a>
                  </div>
                  <div class="botonera col-5">
                    <input type="submit" class="btn-reg" name="btnRegistrar" value="Registrar">
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
  <hr>
  <div class="container mt-5 ">
    <div class="row text-center mt-5" style="background-color: #cecece">
      <div class="col-md-12">
        <strong>Lista de Empleados <span style="color: crimson"> (
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
                  <th style="font-size: 0.85em;">Id</th>
                  <th style="font-size: 0.85em;">Nombre</th>
                  <th style="font-size: 0.85em;">Apellido</th>
                  <th style="font-size: 0.85em;">Tip.Doc</th>
                  <th style="font-size: 0.85em;">Num.Doc</th>
                  <th style="font-size: 0.85em;">Tel</th>
                  <th style="font-size: 0.85em;">E-mail</th>
                  <th style="font-size: 0.85em;">Rol</th>
                  <th style="font-size: 0.85em;">Estado</th>
                  <th style="font-size: 0.85em;">Fech.Reg</th>
                  <th style="font-size: 0.85em;">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                do { ?>
                  <tr>
                    <td style="font-size: 0.85em;">
                      <?php echo $dataEmpleados['id_usuario']; ?>
                    </td>
                    <td style="font-size: 0.85em;">
                      <?php echo $dataEmpleados['nombre_usuario']; ?>
                    </td style="font-size: 0.85em;">
                    <td style="font-size: 0.85em;"><?php echo $dataEmpleados['apellido_usuario']; ?></td>
                    <td style="font-size: 0.85em;"><?php echo $dataEmpleados['tipo_doc']; ?></td>
                    <td style="font-size: 0.85em;"><?php echo $dataEmpleados['num_doc']; ?></td>
                    <td style="font-size: 0.85em;"><?php echo $dataEmpleados['telefono']; ?></td>
                    <td style="font-size: 0.85em;"><?php echo $dataEmpleados['email']; ?></td>
                    <td style="font-size: 0.85em;"><?php $niv = $dataEmpleados['nivel'];
                        switch ($niv) {
                          case 1:
                            echo  '<p>Repartidor</p>';
                            break;
                          case 2:
                            echo  '<p>Vendedor</p>';
                            break;
                          case 3:
                            echo  '<p>Admin</p>';
                            break;
                          default:
                            echo  '<p>Sin definir</p>';
                            break;
                        }
                        ?>
                    </td>

                    <td style="font-size: 0.85em;">
                      <?php $est = $dataEmpleados['estado'];
                      echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Activo </p>' : '<p style="color:red; font-weight:700; ">Inactivo </p>' ?>
                    </td>
                    <td style="font-size: 0.85em;"><?php echo $dataEmpleados['fecha_registro']; ?></td>

                    <td style="font-size: 0.85em; text-align:center; ">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataEmpleados['id_usuario']; ?>">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
<br>
<br>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataEmpleados['id_usuario']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </td>
                  </tr>
              </tbody>


              <!--Ventana Modal para Actualizar--->
              <?php include('mod/ModalEditarE.php'); ?>

              <!--Ventana Modal para la Alerta de Eliminar--->
              <?php include('mod/ModalEliminarE.php'); ?>


            <?php } while ($dataEmpleados = mysqli_fetch_assoc($b_empleados)); ?>

            </table>
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

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $('.btnBorrar').click(function(e) {
        e.preventDefault();
        var id = $(this).attr("id");

        var dataString = 'id=' + id;
        // alert (id + '--' +dataString);
        url = "mod/BorrarE.php";
        $.ajax({
          type: "POST",
          url: url,
          data: dataString,
          success: function(data) {
            window.location.href = "empleados_V.php";
            $('#respuesta').html(data);
          }

        });
        return false;

      });


    });
  </script>

</body>

</html>