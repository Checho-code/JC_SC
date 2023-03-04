<!-- Ventana modal para eliminar -->
<?php $idDelete= $dataCateg['nom_categoria']; ?>
<div class="modal fade" id="deleteChildresn<?php echo $dataCateg['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header justify-content-center bg-danger text-light">
            <h5 class="modal-title ">
            ¿Realmente deseas eliminar este registro?
            </h5>
        </div>

        <div class="modal-body mt-3 mb-3 justify-content-center">
          <p style="text-align: center !important">Vas a borrar => "<strong> 
             <?php echo $idDelete; ?>"</strong></p>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id="<?php echo $dataCateg['id_categoria']; ?>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->