<?php
$id = $dataProduct['id_producto'];
$sql = ("SELECT marcas.nom_marca, categorias.nom_categoria  FROM productos INNER JOIN marcas ON productos.id_marca = marcas.id_marca  INNER JOIN  categorias ON productos.id_categoria= categorias.id_categoria WHERE id_producto = '$id';");
$res = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataProduct['id_producto']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header " style="background-color: #177c03 !important;">
        <h6 class="modal-title " style="color: #fff;">
          Actualizar Información Productos
        </h6>
        <button type="button" class="close"
          style="font-size: 1.2em;font-weight: 700; background-color:red; padding: 3px 6px; border-radius:50%; border:#fff solid 1px; color:#fff;"
          data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="post" action="mod/ModificarProdts.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $dataProduct['id_producto']; ?>">
        <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">Las imagenes no se pueden midificar</h6>



        <div class="row justify-content-around mt-3 p-2">

          <div class="col-5">
            <label for="marca">Marca </label>
            <input type="text" readonly class="form-control" value="<?php echo $row['nom_marca']; ?>">
          </div>

          <div class="col-5">
            <label for="categorias">Categoria </label>
            <input type="text" readonly class="form-control" value="<?php echo $row['nom_categoria']; ?>">
          </div>
        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="nombre producto">Nombre</label>
            <input name="nombre" required type="text" class="form-control" value="<?php echo $dataProduct['nom_producto']; ?>">
          </div>

          <div class="col-5">
            <label for="precios">Precio</label>
            <input type="text"  maxlength="6" name="precio" placeholder="Ingrese precio de venta" class="form-control"
              required autocomplete="off" value="<?php echo $dataProduct['precio']; ?>"
              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" />
          </div>

        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="unidads">Unidad </label>
            <input name="unidad" required type="text" class="form-control" value="<?php echo $dataProduct['unidad']; ?>">
          </div>

          <div class="col-5">
            <label for="porcentajes">Porcentaje </label>
            <select class=" form-control" name="porcentaje" required>
                      <option selected><?php echo $dataProduct['porcentaje']; ?></option>
                      <?php for ($i = 10.0; $i >= 0.5; $i -= 0.5) {
                        echo '<option value="' . $i . '"> ' . $i . '</option>';
                      } ?>
                    </select>
          </div>
        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="my-textarea">Descripción</label>
            <textarea id="my-textarea" class="form-control" name="descripcion"
              rows="3" required><?php echo $dataProduct['descripcion']; ?></textarea>
          </div>

          <div class="col-5">
            <label for="estados">Estado Act. => 
            <span style="font-weight:400; background-color:#177c03; color:#fff; border-radius:6px; padding:4px;"  > " <?php echo $dataProduct['estado']; ?>"
              </span> </label>
            <select class="tip-doc form-control" name="estado" required>
              <option value="Disponible">Disponible</option>
              <option value="No disponible">No disponible</option>
            </select>
          </div>
        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="destacado">Destacar Act. => 
            <span style="font-weight:400; background-color:#177c03; color:#fff; border-radius:6px; padding:4px;"  >  <?php $dest = $dataProduct['destacado'];
                      echo ($dest === 1) ? '"Si"' : '"No"' ?></span>
              </label>
            <select class="tip-doc form-control" name="destacado" required>
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="col-5">
            <img src="../images/img_productos/<?php echo $dataProduct['imagen']; ?>" width="100" height="100" /><br>
            <label for="imagen">La imagen del producto</label>
          </div>
        </div>
        <br>
        <br>

        <div class="modal-footer justify-content-center">
          <div class="row justify-content-around mt-3 p-2">
            <div class="col-4">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
            </div>
            <div class="col-8">
              <button type="submit" class="btn" style="color: #fff; background-color: #177c03; ">Guardar
                Cambios</button>
            </div>
          </div>
        </div>

      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->