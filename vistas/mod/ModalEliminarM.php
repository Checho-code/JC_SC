<!-- Ventana modal para eliminar -->
<?php $idDelete= $dataMarca['nom_marca']; ?>
<div class="modal fade" id="deleteChildresn<?php echo $dataMarca['id_marca']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
            ¿Realmente deseas eliminar este registro?
            </h4>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important"> 
             <?php echo "Vas a borrar => ".$idDelete."";
            ?>
        
          </strong>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger btnBorrar" data-dismiss="modal" id="<?php echo $dataMarca['id_marca']; ?>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->