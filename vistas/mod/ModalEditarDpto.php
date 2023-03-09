<!--ventana para Update--->
<div class="modal fade" id="editDpto<?php echo $dataD['id_dpto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="background-color: #177c03 !important;">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Actualizar Información Departamentos
                </h6>
                <button type="button" class="close" data-dismiss="modal" style="background-color:#177c03;color:#fff; border:solid 2px #fff; border-radius: 50%; padding:5px 10px;">
                    <span aria-hidden="true">X</span>
                </button>
            </div>


            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $dataD['id_dpto']; ?>">
                <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold"> Solo se puede modificar el estado
                </h6>

                <div class="modal-body" id="cont_modal">
                    <div class="form-group mt-2">
                        <label for="nombre producto">Nombre:</label>
                        <input readonly name="nom_dpto" type="text" class="form-control " value="<?php echo $dataD['nombre_dpto']; ?>">
                    </div>

                    <div class="form-group mt-3 mb-2">
                        <label for="tipo-docs">Estado Act. =>
                            <?php $est = $dataD['estado'];
                            echo ($est == 1) ? '<span style="color:green;font-weight:500; ">"Activo"</span>' : '<span style="color:red; font-weight:500; ">"Inactivo"</span>' ?>
                            </td>
                        </label>
                        <select required class="tip-doc form-control" name="estado">
                            <option></option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                </div>
                <?php include 'ModificarDpto.php'; ?>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning " data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" name="btnUpDpto" style="color: #fff; background-color: #177c03;">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->