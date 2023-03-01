<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $row_usuarios['id_usuario']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header " style="background-color: #177c03 !important;">
        <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
          Actualizar Información Usuario
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="mod/ModificarUs.php">
        <input type="hidden" name="id" value="<?php echo $row_usuarios['id_usuario']; ?>">
        <h6 style="color: #000; text-align: center;" class="mt-3 fw-bold">La contraseña se modifica en => <a
            style="color:#177c03; text-decoration: none; background-color: #F7F7F7; padding: 5px; border-radius: 10px; border-bottom: solid 1px #177c03; "
            href="#"> cambiar contraseña</a></h6>


        <div class="row justify-content-around mt-3 p-2">

          <div class="col-5">
            <label for="nombres" class="label">Nombre </label>
            <input name="nombre" type="text" value="<?php echo $row_usuarios['nombre_usuario']; ?>"
              class="form-control" <?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != ''): ?>
                value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
          </div>

          <div class="col-5">
            <label for="apellidos" class="label">Apellido </label>
            <input name="apellido" type="text" value="<?php echo $row_usuarios['apellido_usuario']; ?>"
              class="form-control" <?php if (isset($_REQUEST['apellido']) && $_REQUEST['apellido'] != ''): ?>
                value="<?php echo $_REQUEST['apellido']; ?>" <?php endif; ?>>
          </div>
        </div>


        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="tipo-docs" class="label">Tipo documento </label>
            <select class="tip-doc form-control" name="tipo-doc">
              <option value="<?php echo $row_usuarios['tipo_doc']; ?>"><?php echo $row_usuarios['tipo_doc']; ?></option>
              <option value="Cedula Ciudadania">Ced. Ciudadania</option>
              <option value="Cedula Extranjeria">Ced. Extranjeria</option>
              <option value="Pasaporte">Pasaporte</option>
            </select>
          </div>

          <div class="col-5">
            <label for="num-docs" class="label">Numero </label>
            <input name="numero" type="text" value="<?php echo $row_usuarios['num_doc']; ?>" class="form-control" <?php
               if (isset($_REQUEST['numero']) && $_REQUEST['numero'] != ''): ?>
                value="<?php echo $_REQUEST['numero']; ?>" <?php endif; ?>>
          </div>

        </div>

        <div class="row justify-content-around  mt-3 p-2">
          <div class="col-5">
            <label for="num-tel" class="label">Num. telefono </label>
            <input name="tel" type="number" value="<?php echo $row_usuarios['telefono']; ?>" class="form-control" <?php
               if (isset($_REQUEST['tel']) && $_REQUEST['tel'] != ''): ?> value="<?php echo $_REQUEST['tel']; ?>" <?php
               endif; ?>>
          </div>
          <div class="col-5">
          <label for="tipo-docs" class="label">Estado Act. =><span style="color:orange">
                <?php $est = $row_usuarios['estado'];
                echo ($est == 1) ? '"Activo"' : '"Inactivo"' ?>
              </span> </label>
            <select required class="tip-doc form-control" name="estado">
              <option></option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
        </div>

        <div class="row justify-content-around mt-3 p-2">

          <div class="col-5">
            <label for="correo1s" class="label">Correo </label>
            <input type="email" value="<?php echo $row_usuarios['email']; ?>" name="correo" class="form-control " <?php
               if (isset($_REQUEST['correo']) && $_REQUEST['correo'] != ''): ?>
                value="<?php echo $_REQUEST['correo']; ?>" <?php endif; ?>>
          </div>

          <div class="col-5">
            <label for="clave1s" class="label">Contraseña </label>
            <div class="input-group ">
              <input type="text" readonly value="<?php echo $row_usuarios['rku']; ?>" class="form-control" name="clave"
                id="password" <?php if (isset($_REQUEST['clave1']) && $_REQUEST['clave1'] != ''): ?>
                  value="<?php echo $_REQUEST['clave']; ?>" <?php endif; ?>>
            </div>
          </div>

        </div>


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
</div>
<!---fin ventana Update --->