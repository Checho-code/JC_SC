<div class="ppal">
  <div class="card mb-3 mt-5" style="max-width: 95%; border: none;">
    <div class="row g-0 mt-5">
      <div class="logo col-sm-3 col-md-5 col-lg-2">
        <img src="../img/sistema/logo.png" class="img-fluid " alt="Logo Solcomercial">
      </div>

      <div class="col-sm-2 col-md-6 col-lg-7 mt-3">
        <div class="cont-texto-sol">
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
          <li><a class="dropdown-item" role="button"  data-toggle="modal" data-target="#perfilEmpl">Mi perfil</a></li>
            <li><a class="dropdown-item" href="../controladores/cerrar_sesion_C.php">Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Ventana Modal--->
<?php include('mod/mi-perfil.php'); ?>
<!----------------------------- Navegacion ----------------------------------->

<nav class="navbar navbar-expand-lg  navbar-contenedor fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto nav-item dropdown">

        <li class="nav-item p-2">
          <a class="nav-link fs-6 fw-semibold text-dark link" href="index-base.php">Inicio</a>
        </li>

        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Solcomercial
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="marcas_V.php">Crear marca</a></li>
            <li><a class="dropdown-item" href="premios_V.php">Crear premio</a></li>
            <li><a class="dropdown-item" href="noticias_V.php">Crear noticia</a></li>
            <li><a class="dropdown-item" href="sectores_V.php">Crear sector</a></li>
            <li><a class="dropdown-item" href="Puntos_Solcom.php">Puntos Solcomercial</a></li>
            <li><a class="dropdown-item" href="contactanos2.php">Contáctanos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="caja.php">Caja</a></li>
            <li><a class="dropdown-item" href="solicitud-premio.php">Solicitud premios</a></li>
            <li><a class="dropdown-item" href="premios-entregados.php">Premios entregados</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Empleados
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="empleados_V.php">Registrar empleado</a></li>
            <li><a class="dropdown-item" href="lista-vendedores.php">Transacciones empleados</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="../vistas/productos_V.php">Registrar producto</a></li>
            <li><a class="dropdown-item" href="../vistas/listar-producto.php">Listado de productos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown p-2">
          <a class="nav-link dropdown-toggle fs-6 fw-semibold text-dark link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pedidos
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="ver-pedidos-nuevos.php">Pedidos nuevos</a></li>
            <li><a class="dropdown-item" href="todos-pedidos.php">Todos los pedidos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown p-2">
          <a class=" nav-link dropdown-toggle fs-6 fw-semibold text-dark link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="ver-cli-compras.php">Listado de clientes y sus compras</a></li> <!---- aca voy ---->
            <li><a class="dropdown-item" href="ver-usuario.php">Listado de usuarios</a></li>
            <li><a class="dropdown-item" href="cambio-clave.php">Cambiar contraseña</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown p-2">
          <a class=" nav-link dropdown-toggle fs-6 fw-semibold text-dark link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Informes
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="info-gnral.php">Informe general</a></li>
            <li><a class="dropdown-item" href="info-vendedor.php">Informe por vendedor</a></li>
            <li><a class="dropdown-item" href="info-productos.php">Informe por producto y rango</a></li>
            <li><a class="dropdown-item" href="info-vendedoryrango.php">Informe por vendedor y rango</a></li>
          </ul>
        </li>
      </ul>

      <a class="car-button" href="#"><i class="coche icon fa-solid fa-cart-shopping"></i></a>
      <span class="numProd">0</span>

      <ul class="navbar-nav nav-pills mr-l">
					<a class="btn btn-success m-2" href="busca_prodB.php">BUSCAR PRODUCTOS <span style="margin-left: 10px;"><i class="fa-solid fa-magnifying-glass"></i></span></a>
				</ul>


    </div>
  </div>
</nav>