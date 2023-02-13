<?php include('menuAdmin.php'); ?>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-11"><!--INICIO DEL MENU-->
        
        
        
        <div class="row">
            
            <div class="col-sm-12">
                
                <form   method="post"  enctype="multipart/form-data" >
                    <h2>Agregar marca </h2>
                    
                    <br>
                    <br>
                    <?php include('../controladores/crear_marca.php') ?>
                        <div class="form-group">
                            <label for="nombre producto">Nombre marca *</label>
                            <input name="nombre_marca" type="text" class="form-control" placeholder="Ingrese nombre de la marca" autocomplete="off">
                        </div>

                        <div class="separar">
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="imagen">Seleccione la imagen de la marca</label>
                            <input type="file" name="foto" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif" lang="es">
                        </div>
                        
                        <div class="separar">
                            <br>
                            <br>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="btnGuardar" value="Guardar" class="btn btn-dark">
                           <a href="menuAdmin.php"><input type="button" value="Cancelar" class="btn btn-dark"></a>
                        </div>


                    </form>
                </div>
            </div>