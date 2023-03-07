<div class="contenedorP">

    <h4 class="tituloP">Productos de La Fonda Chocoana</h4>

    <div class="container-fluid secundarioP ">

        <div class="row cont-productos">
            <?php
            $sql = ("SELECT id_marca FROM marcas WHERE nom_marca LIKE '%Fonda%'");
            $marcas = mysqli_query($conexion, $sql);
            $mar = mysqli_fetch_assoc($marcas);
            $idMk = $mar['id_marca'];

            $sql = ("SELECT * FROM productos WHERE id_marca = '$idMk' AND estado = 'Disponible'");
            $productos = mysqli_query($conexion, $sql);
            $consulta = mysqli_fetch_assoc($productos);

            do { ?>
                <div class="col-3 columnasP m-2 ">

                    <form id="formulario" method="POST">

                        <div class="card  tarjetaP">

                            <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['id_usuario'] ?>">
                            <input type="hidden" name="idProd" id="idProd" value="<?php echo $consulta['id_producto'] ?>">
                            <input type="hidden" name="idMarca" id="idMarca" value="<?php echo $consulta['id_marca'] ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="1">
                            <input type="hidden" name="precio" id="precio" value="<?php echo $consulta['precio'] ?>">

                            <div class=" mt-1">
                                <p class="titulo_producto">
                                    <?php echo $consulta['nom_producto'] ?>
                                </p>
                            </div>

                            <div class="cont-imgP mt-1">

                                <a data-toggle="modal" data-target="#verProdConLogueo<?php echo $consulta['id_producto'] ?>">

                                    <img src="../images/img_productos/<?php echo $consulta['imagen']; ?>" class="img-producto " alt="Imagen <?php echo $consulta['nom_producto'] ?> ">
                                </a>
                            </div>



                            <?php include('mod/mod_ver_prod.php'); ?>
                            <!--Ventana Modal--->


                            <div class="contPrecio">
                                <p class="precio "> $
                                    <?php echo $consulta['precio'] ?>
                                </p>
                            </div>

                            <div class=" mt-1 mb-4">
                                <button title="Agregar producto al carrito" type="submit" class="verP" id="addcar" name="btnAddCar">Agregar
                                    <i class="fa-solid fa-cart-plus" style="margin-left: 8px; font-size: 1.2em;"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            <?php } while ($consulta = mysqli_fetch_assoc($productos)) ?>


        </div>
    </div>
</div>