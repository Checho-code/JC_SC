<style>
    .label {
        color: #177c03;
        padding: 3px;
    }

    .datos {

        border: #177c03 solid 1px;
        border-radius: 20px;
    }

    .camb-pass {
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        padding: 10px;
        width: 220px;
        background-color: #177c03;
        color: #fff;
        border-radius: 20px;
        border:none;
    }

    .cierra {
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        padding: 10px;
        width: 220px;
        background-color: #ffdd00;
        color: #177c03;
        border-radius: 20px;
        border:none;
    }
    
    .camb-pass:hover {
        text-decoration: none;
        text-align: center;
        display: inline-block;
        padding: 10px;
        width: 220px;
        background-color: #fff;
        color: #177c03;
        border-radius: 20px;
        border: solid 2px #177c03;
        box-shadow: 5px 5px 15px #177c03;
    }

    .cierra:hover {
        text-decoration: none;
        text-align: center;
        display: inline-block;
        padding: 10px;
        width: 220px;
        background-color: #fff;
        color: #ffdd00;
        border-radius: 20px;
        border: solid 2px #ffdd00;
        box-shadow: 5px 5px 15px #ffdd00;
    }

</style>
<!--ventana para Update--->
<div class="modal fade" id="perfilEmpl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header " style="background-color: #177c03 !important;">
                <h4 class="modal-title text-center col-12" style="color: #fff; text-align: center;">
                    Mi perfil
                </h4>
            </div>

            <div class="row justify-content-around  p-2">

                <div class="col-5 text-center">
                    <label for="nombres" class="label">Nombre </label>
                    <p class="datos">
                        <?php echo $_SESSION['datosU']['nombre_usuario']; ?>
                    </p>
                </div>

                <div class="col-5 text-center">
                    <label for="nombres" class="label">Apellido </label>
                    <p class="datos">
                        <?php echo $_SESSION['datosU']['apellido_usuario']; ?>
                    </p>
                </div>

            </div>


            <div class="row justify-content-around   p-2">
                <div class="col-5 text-center">
                    <label for="tipo-docs" class="label">Tipo documento </label>
                    <p class="datos">
                        <?php echo $_SESSION['datosU']['tipo_doc']; ?>
                    </p>
                </div>

                <div class="col-5 text-center">
                    <label for="num-docs" class="label">Num. Identificacion</label>
                    <p class="datos">
                        <?php echo $_SESSION['datosU']['num_doc']; ?>
                    </p>
                </div>

            </div>

            <div class="row justify-content-around   p-2">
                <div class="col-5 text-center">
                    <label for="num-tel" class="label">Num. telefono </label>
                    <p class="datos">
                        <?php echo $_SESSION['datosU']['telefono']; ?>
                    </p>

                </div>

                <div class="col-5 text-center">
                    <label for="tipo-rol" class="label">Rol</label>
                    <p class="datos">
                        <?php $r = $_SESSION['datosU']['nivel'];
                        switch ($r) {
                            case 1:
                                echo 'Repartidor';
                                break;
                            case 2:
                                echo 'Vendedor';
                                break;
                            case 3:
                                echo 'Admin';
                                break;
                            case 4:
                                echo 'Cliente';
                                break;
                            default:
                                echo 'Sin definir';
                                break;
                        }
                        ?>
                    </p>
                </div>

            </div>

            <div class="row justify-content-around  p-2">

                <div class="col-10 text-center">
                    <label for="correo1s" class="label">Correo </label>
                    <p class="datos">
                        <?php echo $_SESSION['datosU']['email']; ?>
                    </p>
                </div>

            </div>

            <div class="row justify-content-around  p-2">
                <div class="col-5 text-center">
                    <label for="clave1s" class="label">Contraseña </label>
                    <p class="datos">
                        <?php echo $_SESSION['datosU']['rku']; ?>
                    </p>
                </div>

            </div>

            <div class="modal-footer justify-content-center">
                <div class="row justify-content-between  p-2">
                    <div class="col-5">
                        <button type="button" class="cierra" data-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="col-5">
                        <a class="camb-pass" href="../vistas/cambio-clave.php">Cambiar contraseña</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!---fin ventana Update --->