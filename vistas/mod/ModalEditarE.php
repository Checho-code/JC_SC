<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $dataEmpleados['id_usuario']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header " style="background-color: #177c03 !important;">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Actualizar Información Empleado
                </h6>
                <button type="button" class="close" data-dismiss="modal"
                    style="background-color:#177c03;color:#fff; border:solid 2px #fff; border-radius: 50%; padding:5px 10px;">
                    <span aria-hidden="true">X</span>
                </button>
            </div>


            <form method="POST" action="mod/ModificarE.php">
                <input type="hidden" name="id" value="<?php echo $dataEmpleados['id_usuario']; ?>">
                <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">La contraseña se modifica en => <a
                        style="color:#177c03; text-decoration: none; background-color: #F7F7F7; padding: 5px; border-radius: 10px; border-bottom: solid 1px #177c03; "
                        href="../vistas/cambio-clave.php">Cambiar contraseña</a></h6>


                <div class="row justify-content-around mt-3 p-2">

                    <div class="col-5">
                        <label for="nombres" class="label">Nombre </label>
                        <input name="nombre" type="text" value="<?php echo $dataEmpleados['nombre_usuario']; ?>"
                            class="form-control" <?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != '') : ?>
                            value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
                    </div>

                    <div class="col-5">
                        <label for="apellidos" class="label">Apellido </label>
                        <input name="apellido" type="text" value="<?php echo $dataEmpleados['apellido_usuario']; ?>"
                            class="form-control"
                            <?php if (isset($_REQUEST['apellido']) && $_REQUEST['apellido'] != '') : ?>
                            value="<?php echo $_REQUEST['apellido']; ?>" <?php endif; ?>>
                    </div>
                </div>


                <div class="row justify-content-around  mt-3 p-2">
                    <div class="col-5">
                        <label for="tipo-docs" class="label">Tipo documento </label>
                        <select class="tip-doc form-control" name="tipo-doc">
                            <option value="Id Empleado">ID Empleado</option>
                        </select>
                    </div>

                    <div class="col-5">
                        <label for="num-docs" class="label">ID Empleado </label>
                        <input name="numero" type="text" value="<?php echo $dataEmpleados['num_doc']; ?>"
                            class="form-control" <?php if (isset($_REQUEST['numero']) && $_REQUEST['numero'] != '') : ?>
                            value="<?php echo $_REQUEST['numero']; ?>" <?php endif; ?>>
                    </div>

                </div>

                <div class="row justify-content-around  mt-3 p-2">
                    <div class="col-5">
                        <label for="num-tel" class="label">Num. telefono </label>
                        <input name="tel" type="number" value="<?php echo $dataEmpleados['telefono']; ?>"
                            class="form-control" <?php if (isset($_REQUEST['tel']) && $_REQUEST['tel'] != '') : ?>
                            value="<?php echo $_REQUEST['tel']; ?>" <?php endif; ?>>
                    </div>

                    <div class="col-5">

                        <label for="tipo-rol" class="label">Rol Act. =><span style="color:orange"> <?php $r= $dataEmpleados['nivel']; 
               switch ($r) {
                case 1:
                  echo  '"Repartidor"';
                  break;
                case 2:
                  echo  '"Vendedor"';
                  break;
                case 3:
                  echo  '"Admin"';
                  break;
                default:
                  echo  '"Sin definir"';
                  break;
              }
            ?> </span></label>
                        <select required class="tipo-rol form-control" name="nivel">
                            <option></option>
                            <option value="1">Repartidor</option>
                            <option value="2">Vendedor</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>

                </div>

                <div class="row justify-content-around mt-3 p-2">

                    <div class="col-5">
                        <label for="correo1s" class="label">Correo </label>
                        <input type="email" value="<?php echo $dataEmpleados['email']; ?>" name="correo"
                            class="form-control "
                            <?php if (isset($_REQUEST['correo']) && $_REQUEST['correo'] != '') : ?>
                            value="<?php echo $_REQUEST['correo']; ?>" <?php endif; ?>>
                    </div>

                    <div class="col-5">
                        <label for="clave1s" class="label">Contraseña </label>
                        <div class="input-group ">
                            <input type="text" readonly value="<?php echo $dataEmpleados['rku']; ?>"
                                class="form-control" name="clave" id="password"
                                <?php if (isset($_REQUEST['clave1']) && $_REQUEST['clave1'] != '') : ?>
                                value="<?php echo $_REQUEST['clave']; ?>" <?php endif; ?>>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-around mt-3 mb-3 p-2">

                    <div class="col-6">
                        <label for="tipo-docs" class="label">Estado Act. =><span style="color:orange"> <?php $est = $dataEmpleados['estado'];
                      echo ($est == 1) ? '"Activo"' : '"Inactivo"' ?></span> </label>
                        <select required class="tip-doc form-control" name="estado">
                            <option></option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer justify-content-center ">
                    <div class="row  mt-3 p-2">
                      <div class="col-6">
                          <button type="button" class="btn btn-warning" data-dismiss="modal" >Cerrar</button>
                      </div>
                      <div class="col-6">
                          <button type="submit" class="btn" style="color: #fff; background-color: #177c03; width: 220px; ">Guardar
                              Cambios</button>
                      </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
</div>
<!---fin ventana Update --->