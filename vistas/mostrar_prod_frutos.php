<?php

$_SESSION['datosMarcas'] ?>

<div class="contenedorP">

    <h4 class="tituloP">Productos de Frutos del Campo</h4>

    <div class="container-fluid secundarioP ">

        <div class="row cont-productos">
            <?php

            $sql = ("SELECT id_marca FROM marcas WHERE nom_marca LIKE '%Frutos%'");
            $marcas = mysqli_query($conexion, $sql);
            $mar = mysqli_fetch_assoc($marcas);
            $idMk = $mar['id_marca'];

            $sql = ("SELECT * FROM productos WHERE id_marca = '$idMk' AND estado = 'Disponible'");
            $productos = mysqli_query($conexion, $sql);
            $consulta = mysqli_fetch_assoc($productos);

            do { ?>
                <div class="col-3 columnasP m-2 ">
                    <div class="card  tarjetaP">

                        <div class="cont-imgP mt-3">
                            <a data-toggle="modal" data-target="#verProdConLogueo<?php echo $consulta['id_producto'] ?>">
                                <img src="../images/img_productos/<?php echo $consulta['imagen']; ?>" class="img-producto "
                                    alt="Imagen <?php echo $consulta['nom_producto'] ?> ">
                            </a>
                        </div>

                        <div class=" mt-3">
                            <p class="titulo_producto">
                                <?php echo $consulta['nom_producto'] ?>
                            </p>
                        </div>
                        <div class=" mt-3">
                            <!-- <button type="button" class="verP" data-toggle="modal"
                                data-target="#verProdConLogueo</?php echo $consulta['id_producto'] ?>">Ver</button> -->
                            <?php include('mod/mod_ver_prod.php'); ?>
                            <!--Ventana Modal--->
                    </div>
                    <div class=" mt-1 mb-4">
                        <button title="Agregar producto al carrito" type="submit" class="verP" id="addcar"
                            value="">Agregar <i class="fa-solid fa-cart-plus"
                                style="margin-left: 8px;color:#fd0; font-size: 1.2em;"></i> </button>
                    </div>
                </div>
            </div>
            <?php } while ($consulta = mysqli_fetch_assoc($productos)) ?>


        </div>
    </div>
</div>