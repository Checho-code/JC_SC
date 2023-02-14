<?php
session_start();
$usuario= $_SESSION['datosU']['nombre_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" type="text/css" href="../mis_css/menuAdmin1.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/Estilos.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />


  <title>Admin | SolComercial</title>

</head>
<body>
  <div class="ppal">
    <div class="card mb-3 mt-3" style="max-width: 95%; border: none;">
      <div class="row ">
        <div class="logo col-sm-3 col-md-5 col-lg-2">
          <img src="../img/sistema/logo.png" class="img-fluid " alt="Logo Solcomercial">
        </div>

        <div class="col-sm-2 col-md-6 col-lg-7 mt-3">
          <div class="card-body">
            <p class="texto-sol">
              Somos una empresa ubicada en el municipio de Andes-Antioquia, creada para
              acompañar a los campesinos y emprendedores en el proceso de comercialización de sus
              productos, vinculando diferentes marcas, permitiendo tener un amplio portafolio al alcance
              de su mano y desde la comodidad de su hogar.</p>
  
          </div>
        </div>
        <div class=" botonera col-sm-12 col-md-12 col-lg-2 ">
          <div class="dropdown">
            <button class="btn1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user" id="user"></i>
              Bienvenido <b><?php echo $usuario; ?></b>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Mi perfil</a></li>
              <li><a class="dropdown-item" href="../controladores/cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<!---------------------------------------------------------------->
<nav class="navbar navbar-expand-lg  navbar-contenedor">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto nav-item dropdown">
        
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Solcomercial
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Caja</a></li>
            <li><a class="dropdown-item" href="crear_marca.php">Crear marca</a></li>
            <li><a class="dropdown-item" href="#">Crear premios</a></li>
            <li><a class="dropdown-item" href="#">Solicitud premios</a></li>
            <li><a class="dropdown-item" href="#">Premios entregados</a></li>
            <li><a class="dropdown-item" href="#">Puntos Solcomercial</a></li>
            <li><a class="dropdown-item" href="#">¿Quiénes somos?</a></li>
            <li><a class="dropdown-item" href="#">Contáctanos</a></li>
            <li><a class="dropdown-item" href="#">Noticias</a></li>
          </ul>  
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Sectores
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Nuevo sector</a></li>
            <li><a class="dropdown-item" href="#">Listado de sectores</a></li>
          </ul>  
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Vendedores
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Registrar vendedor</a></li>
            <li><a class="dropdown-item" href="#">Listado de vendedores</a></li>
            <a class="dropdown-item" href="#" title="Buscar informacion sobre vendedores en un rango determinado">Filtrar</a>
          </ul>  
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Productos
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Registrar producto</a></li>
            <li><a class="dropdown-item" href="#">Listado de productos</a></li>
          </ul>  
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pedidos
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Pedidos nuevos</a></li>
            <li><a class="dropdown-item" href="#">Todos los pedidos</a></li>
          </ul>  
        </li>
        <li class="nav-item dropdown p-2">
          <a class=" nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Clientes
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Listado de clientes</a></li>
            <li><a class="dropdown-item" href="#">Listado de usuarios</a></li>
            <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
          </ul>  
        </li>
        <li class="nav-item dropdown p-2">
          <a class=" nav-link dropdown-toggle fs-6 fw-semibold text-dark link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Informes
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Informe general</a></li>
            <li><a class="dropdown-item" href="#">Informe por vendedor</a></li>
            <li><a class="dropdown-item" href="#">Informe por producto y rango</a></li>
            <li><a class="dropdown-item" href="#">Informe por vendedor y rango</a></li>
          </ul>  
        </li>
      </ul>
        <ul class="navbar-nav nav-pills mr-l">
					<li class="linkcar nav-item ">
						<a class="nav-link text-light" href="#"><i class="coche icon fa-solid fa-cart-shopping"></i ><span class="numProd">0</span> </a>
					</li>
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"></input>
						<button class="btn btn-outline-success " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
					</form>
				</ul>
        
    </div>
  </div>
</nav>
        
       
  
    
<!---------------- Marcas --------------->
<?php 
include 'marcas.php';
?>
<!---------------- Pdoductos destacados --------------->
<?php 
include 'prod-destacados.php';
?>

<!---------------- Pdoductos destacados --------------->
<?php include 'footer.php'; ?>

<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
<script  src="../js/jquery.js"></script>
<script  src="../js/popper.min.js"></script>
</body>
</html>