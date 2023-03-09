<!-- MODAL CARRITO -->
<?php @$userLine = $row_usuario['id_usuario']; ?>
<div class="modal fade" id="modal_cart<?php echo $row_usuario['id_usuario']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success ">
                <h5 class="modal-title fw-bold text-light mx-2">Mi Carrito</h5>
                <!-- <button type="button" class="btn text-light border-2 bg-danger" data-dismiss="modal">X</button> -->
            </div>

            <h6 class="modal-title text-light text-center bg-success">"Al refrescar, debe regresar al carrito para
                ver
                los
                cambios"
            </h6>
            <div class="modal-body">
                <div class="col-12">

                    <div class="row mt-3">
                        <div class="col-12 p-2">

                            <div class="table-responsive">
                                <table class="table  table-hover">
                                    <thead>
                                        <tr>
                                            <th class="bg-success-subtle " style="font-size: 0.8rem;">Producto
                                            </th>
                                            <th class="bg-success-subtle" style="font-size: 0.8rem;">Cantidad</th>
                                            <th class="bg-success-subtle" style="font-size: 0.8rem;">Acciones</th>
                                            <th class="bg-success-subtle" style="font-size: 0.8rem;">Precio Und.
                                            </th>
                                            <th class="bg-success-subtle" style=" font-size: 0.8rem;">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bodyTable mt-2">
                                        <?php
                                        do { ?>
                                            <form method="POST">
                                                <tr>

                                                    <td class="w-25 ">
                                                        <?php echo $row_usuario['nom_producto']; ?>
                                                    </td>

                                                    <td class="w-0 ">
                                                        <input type="number" class="w-50 text-center" name="cantidad" value="<?php echo $row_usuario['cantidad']; ?>">
                                                        <input type="text" value="<?php echo $row_usuario['id_carrito']; ?>" name="id_carrito">
                                                    </td>

                                                    <td class="w-25 ">
                                                        <button title="Al refrescar, debe regresar al carrito para ver los cambios" class="btn btn-sm btn-warning " name="btnModCant" type="submit">
                                                            <i class="fa-solid fa-rotate"></i>
                                                        </button>
                                                        <button title="Al refrescar, debe regresar al carrito para ver los cambios" class="btn btn-sm btn-danger " name="btnDelProdCar" type="submit">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>

                                                    </td>

                                                    <td class="w-25 ">
                                                        <?php echo "$ " . $row_usuario['precio']; ?>
                                                    </td>
                                                    <td class="subtotal w-25">
                                                        <?php $subt = $row_usuario['cantidad'] * $row_usuario['precio'];

                                                        echo "$ " . $subt; ?>
                                                        <input type="hidden" value="<?php echo  $tot = $tot + $subt;  ?>">
                                                    </td>
                                                </tr>
                                            </form>
                                    </tbody>


                                <?php } while ($row_usuario = mysqli_fetch_assoc($buscar_usuario)); ?>

                                </table>

                                <div class="contTotal col-12 text-center bg-warning mt-5 p-3">
                                    <h5>Total a pagar: <span class="total fw-bold text-light bg-success mt-4 w-75 p-2 mx-5"><?php echo "$ " . $tot ?></span>
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Continuar comprando</button>
                <form method="POST">
                    <button type="submit" class="btn btn-danger" name="btnVaciarCar">
                        Vaciar Carrito <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>

                <a type="button" class="btn btn-success" href="../../../JC_SC/vistas/realizar_pedido.php">Realizar
                    pedido</a>

            </div>

        </div>
    </div>
</div>


<!-- END MODAL CARRITO -->