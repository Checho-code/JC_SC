<!-- MODAL CARRITO -->
<?php @$userLine = $row_usuario['id_usuario']; ?>
<div class="modal fade" id="modal_cart<?php echo $row_usuario['id_usuario']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="cabeza modal-header col-12 ">
                <div class="col col-3">

                </div>
                <div class="col col-6">
                    <h6 class="inf modal-title"> Mi carrito </h6>
                </div>
                <div class="col col-3 ">
                    <input data-dismiss="modal" class="closes" type="button" value="X">
                </div>
            </div>
            <div class="contWarning">
                <h6 class="warning modal-title col-12">"Al refrescar o eliminar, debe regresar al carrito para ver los
                    cambios"
                </h6>
            </div>
            <div class="modal-body">
                <div class="col-12">

                    <div class="row ">
                        <div class="col-12 p-2">

                            <div class="table-responsive">
                                <table class="table  table-hover">
                                    <thead>
                                        <tr>
                                            <th class="titTabla">Producto
                                            </th>
                                            <th class="titTabla">Cantidad</th>
                                            <th class="titTabla">Acciones</th>
                                            <th class="titTabla">Precio Und.
                                            </th>
                                            <th class="titTabla">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bodyTable mt-2">
                                        <?php
                                        $subt = 0;
                                        $tot = 0;

                                        do { ?>
                                        <form method="POST">
                                            <tr>

                                                <td class="w-25 ">
                                                    <?php echo $row_usuario['nom_producto']; ?>
                                                </td>

                                                <td class="w-0 ">
                                                    <input id="numero" type="number" min="1" pattern="^[0-9]+"
                                                        class="w-50 text-center" name="cantidad"
                                                        value="<?php echo $row_usuario['cantidad']; ?>">
                                                    <input type="hidden"
                                                        value="<?php echo $row_usuario['id_carrito']; ?>"
                                                        name="id_carrito">
                                                </td>




                                                <td class=" w-25 ">
                                                    <div class="accion">
                                                        <button
                                                            title="Al refrescar, debe regresar al carrito para ver los cambios"
                                                            class="btn btn-sm btn-warning " name="btnModCant"
                                                            type="submit">
                                                            <i class="fa-solid fa-rotate "></i>
                                                        </button>
                                                        <button
                                                            title="Al eliminar, debe regresar al carrito para ver los cambios"
                                                            class="btn btn-sm btn-danger
                                                         " name="btnDelProdCar" type="submit">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </div>
                                                </td>

                                                <td class="w-25 ">
                                                    <?php echo "$ " . number_format($row_usuario['precio']);
                                                        $subt = $row_usuario['cantidad'] * $row_usuario['precio'] ?>
                                                </td>



                                                <td class="subtotal w-25">
                                                    <?php echo "$ " . number_format($subt); ?>
                                                    <input type="hidden" value="<?php echo  $tot = $tot + $subt;  ?>">
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>


                                    <?php
                                        } while ($row_usuario = mysqli_fetch_assoc($buscar_usuario)); ?>

                                </table>
                                <div class="ct">
                                    <div class="contTotal col-12">
                                        <h5 class="tit-total" id="txtHint">Total a Pagar: <span
                                                class="val-total "><?php echo "$ " . number_format($tot) ?></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="boto modal-footer">
                <button type="button" class="segcomp btn " data-dismiss="modal"><i
                        class="fa-regular fa-circle-left"></i>
                    Continuar comprando</button>
                <form method="POST">
                    <button type="submit" class="vaciarCar btn " name="btnVaciarCar">
                        Vaciar Carrito <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>

                <a type="button" class="pedir btn " href="../../../JC_SC/vistas/realizar_pedido.php">Realizar
                    pedido <i class="fa-solid fa-sack-dollar"></i></a>

            </div>

        </div>
    </div>
</div>


<!-- END MODAL CARRITO -->