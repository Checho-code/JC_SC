<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataCateg['id_categoria']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="background-color: #177c03 !important;">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Actualizar Información Marcas
                </h6>
                <button type="button" class="close" data-dismiss="modal"
                    style="background-color:#177c03;color:#fff; border:solid 2px #fff; border-radius: 50%; padding:5px 10px;">
                    <span aria-hidden="true">X</span>
                </button>
            </div>


            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $dataCateg['id_categoria']; ?>">
                <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold"> La marca no se puede modificar</h6>

                <div class="modal-body" id="cont_modal">

                    <div class="form-group mt-2">
                        <label for="nombre producto">Nombre:</label>
                        <input name="nombre" required type="text" class="form-control "
                            value="<?php echo $dataCateg['nom_categoria']; ?>">
                    </div>

                    <div class="form-group mt-4 mb-5">
                    <label for="marca">Marca:</label>
                        <input class="form-control mb-2 " readonly type="text" value="<?php $marca = $dataCateg['id_marca'];
                        echo ($marca == 114) ? ' Frutos ' : ' Fonda' ?>" >
                        <p style="font-size: 0.75em;color:#177c03; text-align: center;">Para modificar la marca debes eliminar la categoria y volver a crearla.</p>
                    </div>


                </div>
                <?php include 'ModificarCat.php'; ?>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning " data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" name="btnUpCat"
                        style="color: #fff; background-color: #177c03;">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->