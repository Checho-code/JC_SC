<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataPremios['id_premio']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="background-color: #177c03 !important;">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Actualizar Información Premios
                </h6>
                <button type="button" class="close" data-dismiss="modal"
                    style="background-color:#177c03;color:#fff; border:solid 2px #fff; border-radius: 50%; padding:5px 10px;">
                    <span aria-hidden="true">X</span>
                </button>
            </div>


            <form method="POST" action="mod/ModificarP.php">
                <input type="hidden" name="id" value="<?php echo $dataPremios['id_premio']; ?>">
                <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">La imágen no se puede modificar</h6>

                <div class="modal-body" id="cont_modal">
                    <div class="form-group mt-3">
                        <label for="nombre producto">Nombre:</label>
                        <input name="nombre_premio" type="text" class="form-control "
                            value="<?php echo $dataPremios['nombre_premio']; ?>">
                    </div>

                    <div class=" form-group mt-3 mb-3 ">
                        <label for="puntos">Puntos:</label>
                        <input type="number" name="puntos" class="form-control"
                            value="<?php echo $dataPremios['puntos']; ?>" />
                    </div>

                    <div class="form-group mt-3 mb-3 center">
                        <label for="imagen">Imagen del premio:</label>
                        <br>
                        <img src="../images/img_premios/<?php echo $dataPremios['imagen']; ?>" width="100"
                            height="100" />
                    </div>

                    <div class="form-group mt-3 mb-2">
                        <label for="tipo-docs">Estado Act. =>
                            <?php $est= $dataPremios['estado']; echo ($est == 1) ? '<span style="color:green;font-weight:500; ">"Activo"</span>' : '<span style="color:red; font-weight:500; ">"Inactivo"</span>' ?>
                            </td>
                        </label>
                        <select required class="tip-doc form-control" name="estado">
                            <option></option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer justify-content-between mt-3">
                    <button type="submit" class="btn" style="color: #fff; background-color: #177c03; ">Guardar
                        Cambios</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->