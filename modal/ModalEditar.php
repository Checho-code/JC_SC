<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataMarca['id_marca']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header " style="background-color: #177c03 !important;">
        <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
          Actualizar Información marcas
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="recib_Update.php">
        <input type="hidden" name="id" value="<?php echo $dataMarca['id_marca']; ?>">
        <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">Solo puede cambiar nombre y estado</h6>
        <div class="modal-body" id="cont_modal">

          <div class="form-group mt-4">
            <label for="nombre producto">Nombre</label>
            <input name="nombre_marca" type="text" class="form-control " value="<?php echo $dataMarca['nom_marca']; ?>">
          </div>

          <div class="form-group mt-5 mb-5 center">
            <img src="../<?php echo $dataMarca['logo']; ?>" width="100" height="100" /><br>
            <label for="imagen">La imagen de la marca</label>
          </div>

          <div class="form-group mt-5 mb-5">

            <label for="tipo-docs">Estado *</label>
            <select class="tip-doc form-control" name="estado">
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="color: #fff; background-color: #177c03; ">Guardar Cambios</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->