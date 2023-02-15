<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);
$nivel=$_SESSION['nivel'];
if($nivel<3){
	echo "<script type='text/javascript'>
	alert('Usted no tiene permiso para visualizar este archivo');
	window.location='index.php';
	</script>";
}
//Codigo para realizar la busqueda
if(isset($_POST['idProducto']) && is_numeric($_POST['idProducto'])){
	$idProducto=($_POST['idProducto']);
	$desde=($_POST['desde']);
	$hasta=($_POST['hasta']);
	$buscar_productos=mysqli_query($conexion, "SELECT * FROM carrito INNER JOIN clientes ON carrito.idCliente=clientes.idCliente INNER JOIN usuarios ON usuarios.id_usuario=carrito.id_usuario WHERE idProducto=$idProducto AND (fecha>='$desde' AND fecha<='$hasta')");
	$row_los_productos=mysqli_fetch_assoc($buscar_productos);
}
//Juego de registros de los productos
$b_productos=mysqli_query($conexion, "SELECT * FROM productos");
$row_productos=mysqli_fetch_assoc($b_productos);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuAdmin.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Frutos del campo</title>

</head>

<body>
<datalist id="productos">
	<?php do{ ?>
		<option value="<?php echo $row_productos['idProducto']; ?>"><?php echo $row_productos['nombre_producto']; ?></option>
		<?php }while($row_productos=mysqli_fetch_assoc($b_productos)); ?>
	</datalist>

<div class="container-fluid mt-5 mb-5 ">

<div class="row">
	
<div class="col-sm-12">
<h3 style="color: #177c03; text-align: center;">Informe por producto </h3>
<br>
	<form name="busquedaa" method="post">
	<div class="table-responsive">
		<table class=" table table-bordered table-striped table-hover table-sm">
  <tbody>
    <tr class="thead-dark">
      <th scope="col"><input type="text" name="idProducto" class="form-control" required autocomplete="off" placeholder="Elija el producto" list="productos"></th>
      <th scope="col"><input type="date" name="desde" class="form-control" required></th>
	  <th scope="col"><input type="date" name="hasta" class="form-control" required></th>
	  <th scope="col"><input type="submit" value="Buscar" class="btn btn-primary" /></th>
    </tr>
  </tbody>
</table>

		</div>
	</form>
</div>
</div>
	
	<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
		<table class=" table table-bordered table-striped table-hover table-sm">
  <tbody>
    <tr class="thead-dark">
      <th scope="col">Id</th>
      <th scope="col">Cliente</th>
      <th scope="col">Usuario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Costo</th>
	  <th scope="col">Total</th>
    </tr>
	  <?php $cantidad=0; $subtotal=0; $total=0; do{ ?>
    <tr align="center" valign="middle">
      <td><?php echo $row_los_productos['id_registro']; ?></td>
      <td><?php echo $row_los_productos['nombre']; ?></td>
      <td><?php echo $row_los_productos['nombre_usuario']; ?></td>
      <td><?php echo $row_los_productos['fecha']; ?></td>
      <td><?php echo $row_los_productos['cantidad']; $cantidad+=$row_los_productos['cantidad']; ?></td>
      <td><?php echo number_format($row_los_productos['precio_costo']); ?></td>
		<td><?php $subtotal=$row_los_productos['cantidad']*$row_los_productos['precio_costo'];
			echo number_format($subtotal); $total+=$subtotal;
			?></td>
    </tr>
	  <?php }while($row_los_productos=@mysqli_fetch_assoc($buscar_productos)); ?>
	  <h4>Catidad vendida: <?php echo number_format($cantidad)." Total: ".number_format($total); ?></h4>
  </tbody>
</table>

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
</body>

</html>