<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';

//Codigo para registrar el usuario
if(isset($_POST['correo_usuario'])){
	
	$correo_usuario=($_POST['correo_usuario']);
	$nombre_usuario=($_POST['nombre_usuario']);
	$clave=password_hash($_POST['clave'], PASSWORD_DEFAULT);
	
	
	$sql="INSERT INTO usuarios (correo_usuario, nombre_usuario, clave) VALUES (?,?,?)";
	$stmt=$conexion->prepare($sql);
	$stmt->bind_param('sss',$correo_usuario, $nombre_usuario, $clave);
	$stmt->execute();
	$stmt->close();
}

$los_usuarios=mysqli_query($conexion, "SELECT * FROM usuarios");
$row_usuarios=mysqli_fetch_assoc($los_usuarios);
$ver='nover';
if($row_usuarios['id_usuario'] !=''){
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
    <link rel="stylesheet" type="text/css" href="../mis_css/menuAdmin.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Frutos del campo</title>
    <script type="text/javascript">
	function validar_pass(){
		var clave=document.registrar.clave.value;
		var clave2=document.registrar.clave2.value;
		if(clave!=clave2){
			alert('Las contraseñas no coinciden');
			document.registrar.clave.value='';
			document.registrar.clave2.value='';
			return false;
		}
	}
		function nivelar(){
			var id_municipio=document.registrar.id_municipio.value;
			var nivel=document.registrar.nivel.value;
			
			
			
		}
		function confirmacion(id_usuario){
			var confirmar=confirm('Seguro que desea eliminar este usuario?. Esta accion no se puede deshacer');
			if(confirmar){
				window.location='eliminar_usuario.php?id_usuario='+id_usuario;
			}
		}
	</script>
</head>

<body>
<div class="container-fluid mt-5 mb-5 ">
<div class="row">
	
	
<div class="col-sm-12">
<h3 style="color: #177c03; text-align: center;">Listado de Vendedores </h3>
<br>
	<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover table-sm <?php echo $ver; ?>">
  <tbody>
    <tr class="thead-dark">
      <th scope="col">ID</th>
      <th scope="col">CORREO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">ELIMINAR</th>
    </tr>
	  <?PHP do{ ?>
    <tr>
      <td><?php echo $row_usuarios['id_usuario']; ?></td>
      <td><?php echo $row_usuarios['correo_usuario']; ?></td>
      <td><?php echo $row_usuarios['nombre_usuario']; ?></td>
      <td><a href="#" class="btn btn-danger btn-sm <?php echo $ver; ?>" onClick="confirmacion(<?php echo $row_usuarios['id_usuario']; ?>) ">Eliminar</a></td>
    </tr>
	  <?php }while($row_usuarios=mysqli_fetch_assoc($los_usuarios)); ?>
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