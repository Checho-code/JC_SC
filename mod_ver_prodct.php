<!-- este modal es para usuarios sin loguear -->

<!-- este modal es para usuarios logueados  (data-backdrop="static" data-keyboard="false"  esto evita que modalse cierre)-->

<!--ventana para Update--->
<div class="modal fade" id="verProdSinLogueo<?php echo $consulta['id_producto'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <div class="cabeza modal-header col-12 ">
                <div class="col col-3">
                   
                </div>
                <div class="col col-6">
                    <h6 class="inf modal-title"> Información del Producto </h6>
                </div>
                <div class="col col-3 ">
                  <input data-dismiss="modal" class="closes" type="button" value="X">
                </div>
            </div>

           
                <input type="hidden" name="id" value="<?php echo $consulta['id_producto']; ?>">
                
                <input class="nompro" name="nom_producto" readonly value="<?php echo $consulta['nom_producto'] ?>">

                <div class="row justify-content-around mb-5  p-2">

                    <div class="contimg col-5 ">
                        <img class="images" src="images/img_productos/<?php echo $consulta['imagen'] ?>"
                            alt="Imagen  <?php echo $consulta['nom_producto'] ?>">
                    </div>

                    <div class="context col-5 ">
                        <label for="descripcion" class="label">Descripcion: </label>
                        <div class="ccont col-12">
                        <p class="entra" name="descripcion"><?php echo $consulta['descripcion'] ?> </p>  
                        </div>
                        <label for="unidad" class="label">Presentacion: </label>
                        <div class="ccont col-12 ">
                        <input class="entra" name="unidad" readonly value="<?php echo $consulta['unidad'] ?>">    
                        </div>
                        <label for="precio" class="label">Precio: </label>
                        <div class="ccont col-12">
                            <input class="entra" name="precio" readonly value=" $ <?php echo $consulta['precio'] ?>">
                        </div>
                    </div>
                </div>

                <!--------------------------------------------------------->

                <div class="row   mb-3 p-2 justify-content-around">

                    <div class="conirtienda col-4">
                        <button class="btnirtienda btn  rounded-5 " data-dismiss="modal"><i
                                class="fa-regular fa-circle-left" style="margin-right: 8px; font-size: 1.5em;"></i>
                            Ir a tienda </button>
                    </div>

                    <!-- <div class="contmasProd col-4 ">
                        <label for="cantidad" class="labelCant"
                           >Cantidad:</label>
                        <input type="number"  max="99" name="cantidad" class="cantidad" value="0">

                    </div> -->

                    <div class="contAcarro col-4 ">
                        <a href="vistas/login.php" class="btnaddcar2  rounded-5">Agregar <i class="fa-solid fa-cart-plus"
                                style="margin-left: 8px; font-size: 1.3em;"></i></a>
                    </div>
                </div>
        </div>
      
    </div>
</div>

<!---fin ventana Update --->