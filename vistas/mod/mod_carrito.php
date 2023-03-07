<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mi carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <div class="modal-body">
                    <div>
                        <div class="p-2">
                            <ul class="list-group mb-3">
                                <?php
                                if (isset($_SESSION['carrito'])) {
                                    $total = 0;
                                    for ($i = 0; $i <= count($miCarrito) - 1; $i++) {
                                        if (isset($miCarrito[$i])) {
                                            if ($miCarrito[$i] != NULL) {
                                                ?>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div class="row col-12">
                                                        <div class="col-6 p-0" style="text-align: left; color: #000000;">
                                                            <h6 class="my-0">Cantidad:
                                                                <?php echo $miCarrito[$i]['cantidad'] ?> :
                                                                <?php echo $miCarrito[$i]['titulo']; // echo substr($miCarrito[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?>
                                                            </h6>
                                                        </div>
                                                        <div class="col-6 p-0" style="text-align: right; color: #000000;">
                                                            <span class="text-muted" style="text-align: right; color: #000000;">
                                                                <?php echo $miCarrito[$i]['precio'] * $miCarrito[$i]['cantidad']; ?>
                                                                €
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                                $total = $total + ($miCarrito[$i]['precio'] * $miCarrito[$i]['cantidad']);
                                            }
                                        }
                                    }
                                }
                                ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span style="text-align: left; color: #000000;">Total (EUR)</span>
                                    <strong style="text-align: left; color: #000000;">
                                        <?php
                                        if (isset($_SESSION['carrito'])) {
                                            $total = 0;
                                            for ($i = 0; $i <= count($miCarrito) - 1; $i++) {
                                                if (isset($miCarrito[$i])) {
                                                    if ($miCarrito[$i] != NULL) {
                                                        $total = $total + ($miCarrito[$i]['precio'] * $miCarrito[$i]['cantidad']);
                                                    }
                                                }
                                            }
                                        }
                                        $total = (!isset($total)) ? '0' : $total;
                                        echo $total; ?> $
                                    </strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-primary" href="../../controladores/vaciarCarrito.php">Vaciar
                    carrito</a>
                <a type="button" class="btn btn-success" href="#">Continuar
                    pedido</a>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL CARRITO -->