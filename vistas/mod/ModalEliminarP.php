<!-- Ventana modal para eliminar -->
<?php $idDelete= $dataPremios['nombre_premio']; ?>
<div class="modal fade" id="deleteChildresn<?php echo $dataPremios['id_premio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
          <button type="submit" class="btn btn-danger btnBorrarP" data-dismiss="modal" id="<?php echo $dataPremios['id_premio']; ?>">Borrar</button>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->