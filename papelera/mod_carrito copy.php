<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart<?php echo $row_usuario['id_usuario']; ?>" tabindex="-1" aria-hidden="true">
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

                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div class="row col-12">
                                        <div class="col-6 p-0" style="text-align: left; color: #000000;">
                                            <h6 class="my-0">


                                            </h6>
                                        </div>
                                        <div class="col-6 p-0" style="text-align: right; color: #000000;">
                                            <span class="text-muted" style="text-align: right; color: #000000;">

                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span style="text-align: left; color: #000000;">Total a pagar: </span>
                                    <strong style="text-align: left; color: #000000;">

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