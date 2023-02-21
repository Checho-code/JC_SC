<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);
if($_SESSION['datosU']['nivel']<3){
	header('Location: index.php');
}
$id_usuario_conectado=$_SESSION['datosU']['id_usuario'];
$nivel=$_SESSION['datosU']['nivel'];
if($nivel>=3){
	/*echo "<script type='text/javascript'>
	alert('Usted no tiene permiso para visualizar este archivo');
	window.location='index.php';
	</script>";*/
	//Juego de registros para buscar los vendedores
$b_vendedores=mysqli_query($conexion, "SELECT * FROM usuarios");
$row_usuarioss=mysqli_fetch_assoc($b_vendedores);
	
}
else{
	$b_vendedores=mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuario='$id_usuario_conectado'");
$row_usuarioss=mysqli_fetch_assoc($b_vendedores);
}
$ver='nover';
//Codigo para hacer la busqueda
if(isset($_POST['datosU']['id_usuario']) && $_POST['datosU']['id_usuario']==$id_usuario_conectado){
	$id_usuario=($_POST['datosU']['id_usuario']);
	/*echo "<script type='text/javascript'>
	alert($id_usuario);
	</script>";*/
	$los_usuarios0=mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuario='$id_usuario'");
$row_usuarios0=mysqli_fetch_assoc($los_usuarios0);
	$ver='';
}
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
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Frutos del campo</title>

</head>

<body>
<datalist id="vendedores">
	<?php do{ ?>
		<option value="<?php echo $row_usuarioss['id_usuario']; ?>"><?php echo $row_usuarioss['nombre_usuario']; ?></option>
		<?php }while($row_usuarioss=mysqli_fetch_assoc($b_vendedores)); ?>
	</datalist>

<div class="container-fluid mt-5 mb-5 ">

<div class="row">
	
<div class="col-sm-12">
<h3 style="color: #177c03; text-align: center;">Informe por vendedor  </h3>
<br>
	<div class="table-responsive">
		<form name="busquedaa" method="post">
	<table class=" table table-bordered table-striped table-hover table-sm">
  <tbody>
    <tr align="center" valign="middle" class="thead-dark">
      <th width="78%" scope="col"><input name="id_usuario0" type="text" required class="form-control" placeholder="Elija un vendedor de la lista" list="vendedores" autocomplete="off" ></th>
      <th width="22%" scope="col"><input type="submit" value="Buscar" class="btn btn-primary" /></th>
    </tr>
  </tbody>
</table>
		</form>

	</div>
	
</div>
</div>
	<div class="row">
	<div class="col-md-12">
		<div class="table-responsive  <?php echo $ver; ?>">
	<table class="table table-bordered table-striped table-hover table-sm <?php echo $ver; ?>">
  <tbody>
    <tr class="thead-dark  <?php echo $ver; ?>">
      <th scope="col">ID</th>
      <th scope="col">Correo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Pedidos</th>
	  <th scope="col">Comisiones</th>
	  <th scope="col">Pagado</th>
	  <th scope="col">Saldo</th>
	  <th scope="col">Pagar comisiones</th>
    </tr>
	  <?PHP do{ ?>
    <tr align="center" valign="middle" class=" <?php echo $ver; ?>">
      <td><?php echo $row_usuarios0['id_usuario']; $id_usu=$row_usuarios0['id_usuario']; ?></td>
      <td><?php echo $row_usuarios0['correo_usuario']; ?></td>
      <td><?php echo $row_usuarios0['nombre_usuario']; ?></td>
      <td><a href="ver_pedidos.php?id_usuario=<?php echo $row_usuarios0['id_usuario']; ?>" class="btn btn-info btn-sm">Pedidos</a></td>
		<td><?php
			   $porcentaje=0;
			   $b_carro=mysqli_query($conexion, "SELECT * FROM carrito WHERE id_usuario=$id_usu");
			while($row_carro=mysqli_fetch_assoc($b_carro)){
				$porcentaje+=$row_carro['porcentaje'];
			} 
			echo number_format($porcentaje,2);
			?></td>
		<td><?php $b_pagos=mysqli_query($conexion, "SELECT SUM(total) AS total_suma FROM abono_comision WHERE id_usuario=$id_usu");
			$row_pagos=mysqli_fetch_assoc($b_pagos); 
			echo number_format($row_pagos['total_suma'],2);
			?></td>
		<td><?php echo number_format($porcentaje-$row_pagos['total_suma']); ?></td>
		<td><a href="pagar_comision.php?id_usuario=<?php echo $row_usuarios['id_usuario']; ?>" class="btn btn-success btn-sm">Pagar</a></td>
    </tr>
	  <?php }while($row_usuarios0=@mysqli_fetch_assoc($los_usuarios0)); ?>
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
    <?php include('footer.php'); ?>

    <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
</body>
</html>