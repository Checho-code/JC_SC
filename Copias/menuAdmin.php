
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/mi_estilo.css" />
	<link rel="stylesheet" type="text/css" href="./mis_css/menuCliente.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/menuBasico.css" />
	<link rel="stylesheet" type="text/css" href="./mis_css/estilos-index.css" />
	<link rel="stylesheet" type="text/css" href="./css/galeria.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

<div class="ppal">
		<div class="card mb-3 mt-3" style="max-width: 95%; border: none;">
			<div class="row g-0">
				<div class="col-md-2">
					<img src="img/sistema/logo.png" class="img-fluid rounded-start" alt="Logo Solcomercial">
				</div>
				<div class="col-md-7">
					<div class="card-body mt-2 mr-3">
					
						<p class="card-text ">Somos una empresa ubicada en el municipio de Andes-Antioquia, creada para
							acompañar a los campesinos y emprendedores en el proceso de comercialización de sus
							productos, vinculando diferentes marcas, permitiendo tener un amplio portafolio al alcance
							de su mano y desde la comodidad de su hogar.</p>

					</div>
				</div>
				<div class=" botonera col-md-2  ">
					<div class="btn-group-vertical">
						<div><a href="../vistas/login.php" class="login">Ingresar</a></div>
						<div><a class="register" href="f_registro.php">Registrate</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!---------------------------------------------------------------->

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ffbb00;">
  <a class="navbar-brand <?php echo $ver; ?>" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin.
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="saldo_caja"><dfn title="Reciba el saldo que se encuentra en la caja del administrador">Caja</dfn></a>
          <a class="dropdown-item" href="escala_premios"><dfn title="Cree los premios que los usuarios ganaran por sus puntos">Crear premios</dfn></a>
          <!--<a class="dropdown-item" href="buscar_vendedor.php"><dfn title="Buscar informacion sobre un vendedor y el historial de sus ventas">Buscar</dfn></a>-->
          <!--<div class="dropdown-divider"></div>-->

        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Nosotros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="noticias"><dfn title="Vea y edite los subdepartamentos que tiene registrados">Noticias</dfn></a>
          <!--<a class="dropdown-item" href="buscar_vendedor.php"><dfn title="Buscar informacion sobre un vendedor y el historial de sus ventas">Buscar</dfn></a>-->
          <!--<div class="dropdown-divider"></div>-->

        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="carrito">Carrito<?php echo @$filas2; ?></span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="publicar">Publicar <span class="carro" id="carro"></span></a>
      </li> -->



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sectores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="crear_sector"><dfn title="Registrar un nuevo sector o municipio">Nuevo sector</dfn></a>
          <a class="dropdown-item" href="listado_sectores"><dfn title="Ver los sectores registrados">Listado sectores</dfn></a>



          <!--<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="nueva_lista.php">Nueva lista</a>
			<a class="dropdown-item" href="mis_listas.php">Mis listas</a>
			<a class="dropdown-item" href="historial_listas.php">Todas las listas</a>-->


      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vendedores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="nuevo_vendedor"><dfn title="Registrar un nuevo vendedor">Registrar vendedor</dfn></a>
          <a class="dropdown-item" href="listado_vendedores"><dfn title="Elija la finca para crear las planillas ">Listado vendedores</dfn></a>
          <a class="dropdown-item" href="filtrar_clientes"><dfn title="Buscar informacion sobre vendedores en un rango determinado">Filtrar</dfn></a>
          <!--<div class="dropdown-divider"></div>-->

        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="nuevo_producto"><dfn title="Registrar un nuevo producto">Registrar</dfn></a>
          <a class="dropdown-item" href="listado_productos"><dfn title="Lista de todos los productos registrados">Listado de productos</dfn></a>



          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="agotados">Agotados</a>
        </div>-->
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pedidos <span style="background-color: red; border-radius: 25px;"><!--<?php echo $ped; ?>--></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="pedidos_nuevos"><dfn title="Mire los pedidos que estan pendientes de despacho">Pedidos nuvos</dfn></a>

          <a class="dropdown-item" href="ver_pedidos"><dfn title="Mire todos los pedidos">Todos los pedidos</dfn></a>

<!-- Esto esta en panel admin -->

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="solicitud_premio" title="Lista de premios por entregar">Solicitud premios</a>
          <a class="dropdown-item" href="historial_premios_entregados" title="Todos los premios que han sido entregados">Premios entregados</a>
        </div>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" href="ver_clientes.php"><dfn title="Listado de los clientes registrados">Listado de clientes</dfn></a>
          <a class="dropdown-item" href="cambiar_clave.php"><dfn title="Archivo para cambiar la clave de un usuario">Cambiar contraseña</dfn></a>

          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="agotados">Agotados</a>
        </div>-->
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="mi_perfil">Mi perfil</a>
          <a class="dropdown-item" href="f_nuevo_usuario">Lista usuarios</a>


        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Informes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="informe_general">informe general</a>
          <a class="dropdown-item" href="f_informe_vendedor">Informe por vendedor</a>
          <a class="dropdown-item" href="informe_por_producto">informe por producto y rango</a>
          <a class="dropdown-item" href="informe_vendedor_rango">informe por vendedor y rango</a>
          <!--<div class="dropdown-divider"></div>-->


        </div>
      </li>




      <li class="nav-item">
        <a class="nav-link" href="redimir">Puntos: <!--<?php echo number_format($puntos); ?>--></span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="desconectar.php">Salir</a>
      </li>

      <li class="nav-item">
        <!--<form name="busqueda" method="post" action="busqueda.php" class="form-inline">
			<input class="form-control mr-sm-2" type="search" placeholder="Numero de semana" aria-label="Search" required name="buscar" list="clientes" autocomplete="off" />
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			</form>-->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mi_perfil">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$_SESSION['nombre_usuario']; ?></a>
      </li>
    </ul>
    <!--<form class="form-inline my-2 my-lg-0" name="buscar" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>-->
  </div>
  
</nav>
<h4>Admin</h4>