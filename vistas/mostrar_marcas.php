<!---------------- Marcas ----------------->

<div class="contenedorMarca">

<h4 class="tituloMarca">Nuestras marcas</h4>

<div class="container-fluid  secundarioMarca ">

    <div class="row contMarca">
        <?php
        $query = mysqli_query($conexion, "SELECT * FROM marcas");
        while ($consulta = mysqli_fetch_array($query)){ ?>
        <div class="col columnasMarca m-2">
            <div class="card  tarjetaMarca ">
                <a class="link-imgMarca" href="<?php $nom = $consulta['nom_marca'];
                    if ($nom == "Frutos del campo") {
                        echo "index-frutos.php";
                    } else {
                        echo "index-fonda.php";

                    } ?>"><img src="../images/img_marcas/<?php echo $consulta['logo'] ?>" class="img-marca "
                        alt="Imagen <?php echo $consulta['nom_marca'] ?>"></a>
                <div class=" mt-3">
                    <p class="nombreMarca">
                        <?php echo $consulta['nom_marca'] ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>