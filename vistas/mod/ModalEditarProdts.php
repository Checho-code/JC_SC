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
        <button type="button" class="close" data-dismiss="modal"
          style="background-color:#177c03;color:#fff; border:solid 2px #fff; border-radius: 50%; padding:5px 10px;">
          <span aria-hidden="true">X</span>
        </button>
      </div>


      <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $dataProduct['id_producto']; ?>">
        <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">La imagen, marca y categoria no se pueden midificar</h6>



        <div class="row justify-content-around mt-3 p-2">

          <div class="col-5">
            <label for="marca">Marca: </label>
            <input type="text" readonly class="form-control" value="<?php echo $row['nom_marca']; ?>">
          </div>

          <div class="col-5">
            <label for="categorias">Categoria: </label>
            <input type="text" readonly class="form-control" value="<?php echo $row['nom_categoria']; ?>">
          </div>
        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="nombre producto">Nombre:</label>
            <input name="nombre" required type="text" class="form-control"
              value="<?php echo $dataProduct['nom_producto']; ?>">
          </div>

          <div class="col-5">
            <label for="precios">Precio:</label>
            <input type="text" maxlength="6" name="precio" placeholder="Ingrese precio de venta" class="form-control"
              required autocomplete="off" value="<?php echo $dataProduct['precio']; ?>"
              onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" />
          </div>

        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="unidads">Unidad: </label>
            <input name="unidad" required type="text" class="form-control"
              value="<?php echo $dataProduct['unidad']; ?>">
          </div>

          <div class="col-5">
            <label for="porcentajes">Porcentaje: </label>
            <select class=" form-control" name="porcentaje" required>
              <option selected>
                <?php echo $dataProduct['porcentaje']; ?>
              </option>
              <?php for ($i = 10.0; $i >= 0.5; $i -= 0.5) {
                echo '<option value="' . $i . '"> ' . $i . '</option>';
              } ?>
            </select>
          </div>
        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="my-textarea">Descripción:</label>
            <textarea id="my-textarea" class="form-control" name="descripcion" rows="3"
              required><?php echo $dataProduct['descripcion']; ?></textarea>
          </div>

          <div class="col-5">
            <label for="estados">Estado Act. =>
              <?php $est= $dataProduct['estado']; echo ($est=="Disponible") ? '<span style="color:green;">"Disponible"</span>' : '<span style="color:red;">"Disponible"</span>'?> </label>
            <select class="tip-doc form-control" name="estado" required>
            <option value="Seleccione">Seleccione</option>
              <option value="Disponible">Disponible</option>
              <option value="No disponible">No disponible</option>
            </select>
          </div>
        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="destacado">Destacar Act. =>
            <?php $est= $dataProduct['destacado']; echo ($est==1) ? '<span style="color:green;">"Si"</span>' : '<span style="color:red;">"No"</span>'?> </label>

           
            <select class="tip-doc form-control" name="destacado" required>
              <option value="Seleccione">Seleccione</option>
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="col-5">
            <label for="imagen">Imagen producto:</label>
            <img src="../images/img_productos/<?php echo $dataProduct['imagen']; ?>" width="100" height="100" alt="Imagen <?php echo $dataProduct['nom_producto']; ?> " /><br><br>
          </div>
        </div>

        <?php include 'ModificarProdts.php'; ?>

        <div class="modal-footer ">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="btnUpProd" class="btn" style="color: #fff; background-color: #177c03; ">Guardar
            Cambios</button>

        </div>
    </div>

    </form>

  </div>
</div>
</div>
<!---fin ventana Update --->