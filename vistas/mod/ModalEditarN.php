<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataNoticias['id_noticia']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header " style="background-color: #177c03 !important;">
        <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
          Actualizar Información Noticias
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="mod/ModificarN.php">
        <input type="hidden" name="id" value="<?php echo $dataNoticias['id_noticia']; ?>">
        <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">Lo único que no se puede editar es la imágen</h6>
        
        <div class="modal-body" id="cont_modal">
         <div class="form-group mt-4">
            <label for="titulo">Título</label>
            <input type="text" name="titulo"  class="form-control" value="<?php echo $dataNoticias['titulo']; ?>">
          </div>

          <div class="form-group mt-4">
            <label for="noticia">Noticia </label>
            <textarea name="noticia" class="form-control"><?php echo $dataNoticias['noticia']; ?></textarea>
          </div>

          <div class="form-group mt-4 center">
            <img src="../<?php echo $dataNoticias['imagen']; ?>" width="100" height="100" /><br>
            <label for="imagen">La imagen de la noticia</label>
          </div> 

          <div class="form-group mt-4 ">
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