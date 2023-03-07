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

                    <form method="POST" action="../controladores/addCarrito.php">

                        <div class="card  tarjetaP">


                            <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['id_usuario'] ?>">
                            <input type="hidden" name="idProd" id="idProd" value="<?php echo $consulta['id_producto'] ?>">
                            <input type="hidden" name="idMarca" id="idMarca" value="<?php echo $consulta['id_marca'] ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="1">

                            <div class=" mt-1">
                                <p class="titulo_producto">
                                    <?php echo $consulta['nom_producto'] ?>
                                </p>
                            </div>

                            <div class="cont-imgP mt-3">

                                <a data-toggle="modal"
                                    data-target="#verProdConLogueo<?php echo $consulta['id_producto'] ?>">

                                    <img title="Mostar descripcion del producto"
                                        src="../images/img_productos/<?php echo $consulta['imagen']; ?>"
                                        class="img-producto " alt="Imagen <?php echo $consulta['nom_producto'] ?> ">
                                </a>

                            </div>

                            <?php include('mod/mod_ver_prod.php'); ?>



                            <div class="w-75 mt-3 mx-4" style="background-color: #fd0; border-radius: 45px; ">

                                <input type="hidden" name="precio" id="precio" value="<?php echo $consulta['precio'] ?>">

                                <p class="titulo_producto " style=" font-weight: 600; "> $
                                    <?php echo $consulta['precio'] ?>
                                </p>
                            </div>



                            <div class=" mt-1 mb-4">
                                <button title="Agregar producto al carrito" type="submit" class="verP" id="addcar"
                                    name="btnAddCar">Agregar
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