<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataPremios['id_premio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header " style="background-color: #177c03 !important;">
        <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
          Actualizar Información Premios
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="mod/ModificarP.php">
        <input type="hidden" name="id" value="<?php echo $dataPremios['id_premio']; ?>">
        <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">Lo único que no sepuede actualizar es la imagen</h6>
        <div class="modal-body" id="cont_modal">

          <div class="form-group mt-3">
            <label for="nombre producto">Nombre</label>
            <input name="nombre_premio" type="text" class="form-control " value="<?php echo $dataPremios['nombre_premio']; ?>">
          </div>
          <div class=" form-group mt-3 mb-3 ">
                  <label for="puntos">Puntos</label>
                  <input type="number" name="puntos" class="form-control" value="<?php echo $dataPremios['puntos']; ?>" />
                </div>
          <div class="form-group mt-3 mb-3 center">
            <img src="../img/premios/<?php echo $dataPremios['imagen']; ?>" width="100" height="100" /><br>
            <label for="imagen">La imagen del premio</label>
          </div>

          <div class="form-group mt-3 mb-3">

            <label for="tipo-docs">Estado </label>
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

