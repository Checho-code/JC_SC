<!-- este modal es para usuarios logueados -->

<!--ventana para Update--->
<div class="modal fade" id="verProdConLogueo<?php echo $consulta['id_producto'] ?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <div class="cabeza modal-header col-12 ">
        <div>
          <h6 class="inf modal-title"> Información del Producto </h6>
        </div>
        <!-- <div>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close">X</button>
        </div> -->
      </div>

      <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $consulta['id_producto']; ?>">
        <h6 class="nompro">
          <?php echo $consulta['nom_producto'] ?>
        </h6>
       
        <div class="row justify-content-around mb-5  p-2">

          <div class="contimg col-5 ">
            <img class="images" src="../images/img_productos/<?php echo $consulta['imagen'] ?>" alt="Imagen  <?php echo $consulta['nom_producto'] ?>">
          </div>

          <div class="context col-5 ">
            <label for="apellidos" class="label">Descripcion </label>
            <div class="ccont col-12">
              <p>
                <?php echo $consulta['descripcion'] ?>
              </p>
            </div>
            <label for="apellidos" class="label">Presentacion </label>
            <div class="ccont col-12 ">
              <p>
                <?php echo $consulta['unidad'] ?>
              </p>
            </div>
            <label for="apellidos" class="label">Precio </label>
            <div class="ccont col-12">
              <p>
                <?php echo $consulta['precio'] ?>
              </p>
            </div>
          </div>
        </div>
        
        <!--------------------------------------------------------->
        
        <div class="row justify-content-around mt-3 mb-5 p-2">

          <div class="conirtienda col-3 ">
            <button type="button" class="btnirtienda btn " data-dismiss="modal"><i class="fa-regular fa-circle-left"></i>
              Tienda </button>
          </div>

          <div class="contmasProd col-3 ">
            <i class="ms fa-solid fa-plus"></i>

            <input type="text" name="cantidad" class="cantidad">

            <i class="mn fa-solid fa-minus"></i>
          </div>


          <div class="contAcarro col-3 ">
            <button type="button" class="btnaddcar btn " data-dismiss="modal">Agregar <i
                class="fa-solid fa-cart-plus"></i></button>
          </div>
        </div>


      </form>

    </div>
  </div>
</div>

<!---fin ventana Update --->