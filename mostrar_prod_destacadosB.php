<div class="contenedorP">

    <h4 class="tituloP">Productos Destacados</h4>

    <div class="container-fluid secundarioP ">

        <div class="row cont-productos">
            <?php
            $sql = ("SELECT * FROM productos WHERE destacado = 1 AND estado = 'Disponible'");
            $productos = mysqli_query($conexion, $sql);
            $consulta = mysqli_fetch_assoc($productos);

            do { ?>
                <div class="col-3 columnasP m-2 ">
                    <div class="card  tarjetaP">
                        <div class=" mt-1">
                            <p class="titulo_producto">
                                <?php echo $consulta['nom_producto'] ?>
                            </p>
                        </div>
                        <div class="cont-imgP mt-1">
                            <img src="images/img_productos/<?php echo $consulta['imagen']; ?>" class="img-producto " alt="Imagen <?php echo $consulta['nom_producto'] ?> ">
                        </div>
                        <div class="contPrecio">
                            <p class="precio "> $
                                <?php echo $consulta['precio'] ?>
                            </p>
                        </div>

                        <div class=" mt-3">
                            <button type="button" class="verP" data-toggle="modal" data-target="#verProdSinLogueo<?php echo $consulta['id_producto'] ?>">Ver</button>
                            <?php include('mod_ver_prodct.php'); ?>
                            <!--Ventana Modal--->
                        </div>
                    </div>
                </div>
            <?php } while ($consulta = mysqli_fetch_assoc($productos)) ?>


        </div>
    </div>

</div>