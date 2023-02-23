<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../vistas/menuAdmin.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="../controladores/eliminar-prem.js"></script> -->



    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />
    
    <title>Frutos del campo</title>

</head>

<script>
    function confirmar(){
        var res = confirm('¿lo va a lemiminar?');
        if  (res){
            return true;
        }else{
            return false;
        }
    }
</script>

<body>

    <div class="container-fluid mt-5 mb-5 ">
        <div class="row">
            
            <div class="col-sm-5">
                <h4 style="color: #177c03; text-align: center;">Crear premio </h4>
                
                <form name="plan_premios" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre_premio">Nombre del premio *</label>
                        <input type="text" name="nombre_premio" class="form-control" autocomplete="off" placeholder="Nombre del premio a entregar" />
                    </div>
                    <div class="separar">
                        <?php include('../controladores/crear-premios_C.php'); ?>
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="puntos">Puntos necesarios *</label>
                        <input type="number" name="puntos" class="form-control" placeholder="Ingrese los puntos que se requieren para ganar el premio" />
                    </div>
                    <div class="separar">
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Seleccione la imagen del producto</label>
                        <input type="file" name="imagen" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif, image/webp" lang="es">
                    </div>
                    <div class="separar">
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnGuardarPremio" class="btn btn-primary" value="Crear premio" style="background-color: #177c03; color:#ffffff" />
                        <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>
                        
                    </div>
                </form>
            </div>
            

            <div class="col-md-7">
                <h4 style="color: #177c03; text-align: center;">Premios</h4>
                <!-- <form class="form-eliminar"> -->
                <div class="table-responsive">
                
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tbody>
                            <tr align="center">
                                    <th>Id</th>
                                    <th>Premio</th>
                                    <th>Puntos</th>
                                    <th>Imagen</th>
                                    <th>Quitar</th>
                                </tr>
                                <?php do { ?>
                                    <tr align="center">
                                        <td><?php echo $row_premios['id_premio']; ?></td>
                                        <td><?php echo $row_premios['nombre_premio']; ?></td>
                                        <td><?php echo number_format($row_premios['puntos']); ?></td>
                                        <td><img src="../img/premios/<?php echo $row_premios['imagen']; ?>" width="100" height="100" /></td>

                                     <td> <button class="btn btn-sm btn-danger eliminar"  name="btnBorrarPremio">Quitar</button></td> 

                                        <!-- <td> <a class="btn btn-sm btn-danger" role="button" href="../controladores/eliminar-premio_C.php?id_premio=<//?php echo $row_premios['id_premio'] ?>">Quitar</a></td> -->
                                    </tr>
                                <?php } while ($row_premios = mysqli_fetch_assoc($b_premios)); ?>
                            </tbody>
                        </table>
                        <!-- </form> -->
                </div>
            </div>
        </div>


    </div>

    <br>
    <br>
    <br>
    <br>



    <!---------------- Footer --------------->
    <?php include('footer.php') ?>
    <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>

    <script>
        $('.eliminar').click(function(e) {
            e.preventDefault();
            Swal.fire({
       title: 'Are you sure?',
       text: "You won't be able to revert this!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete it!'
     }).then((result) => {
       if (result.isConfirmed) {<?php
        $eliminar = $_GET['id_premio'];

$sentencia =  $conexion->query("DELETE FROM premios WHERE id_premio ='$eliminar'");?>
       }
     })

        });



    </script>
</body>

</html>