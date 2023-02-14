<?php
require('conexion/conexion.php');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Solcomercial</title>

    <link rel="stylesheet" type="text/css" href="../mis_css/categoriasIndex.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/galeria.css" />

    <script type="text/javascript" src="js/jquery.js"></script>

    <script type="text/javascript">
        function cargar_carrito(str, unidad, contador, cantidad) {
            var xmlhttp;


            /*if(isNaN(cantidad) || cantidad==0){
            	alert('Valor invalido, no se ha realizado el registro');
            }*/

            if (cantidad && cantidad > 0) {

                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObjet("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("carro").innerHTML = '';
                        document.getElementById("carro").innerHTML = xmlhttp.responseText;
                        document.getElementById("carro" + contador).innerHTML = "Agregado" + " " + cantidad;

                    }
                }
            }

            xmlhttp.open("GET", "cargar_carrito.php?idProducto=" + str + "&cantidad=" + cantidad, true);
            xmlhttp.send();

        }

        function aumentar(contador) {
            var nuevo_valor = document.getElementById('cantidad' + contador).value;
            nuevo_valor = parseInt(nuevo_valor);
            nuevo_valor = nuevo_valor + 1;
            document.getElementById('cantidad' + contador).value = nuevo_valor;
        }
    </script>
</head>

<body>
       
        <div class="row">
           
            <div class="col-sm-10">
                <!--<h2>Elija los productos que desea comprar</h2>-->
                <!--Inicio de la talba modal para enviar los pedidos-->





                <?php $contador = 0;
                do { ?>

                    <div>
                        <?php 
                        $b_productos = mysqli_query($conexion, "SELECT * FROM productos WHERE  estado>0");
                        $row_productos = @mysqli_fetch_assoc($b_productos);
                        ?>
                        <ul class="galeria">
                            <?php do { ?>
                                <div >
                                    <li>
                                        <figure>
                                            <a href="../img/<?php echo $row_productos['imagen']; ?>" target="_blank">
                                                <img src="img/miniaturas/<?php echo $row_productos['imagen']; ?>" width="320" alt="<?php echo $row_productos['nombre_producto']; ?>" />
                                            </a>
                                            <figcaption>
                                                <b style="font-size: 20px;"><?php echo $row_productos['nombre_producto']; ?></b><br><br>

                                                <b style="font-size: 24px;"><?php echo "$" . number_format($row_productos['precio']); ?> &nbsp;<?php echo $row_productos['unidad']; ?>
                                                </b><br>
                                                <input name="cantidad" type="text" id="cantidad<?php echo $contador; ?>" placeholder="Cantidad" autocomplete="off" onkeyup="cargar_carrito(<?php echo $row_productos['idProducto']; ?>, '<?php echo $row_productos['unidad']; ?>',<?php echo $contador; ?>, this.value) " size="6" />
                                                <?php $id_prod = $row_productos['idProducto'];
                                                $texto = '';
                                                $clase = "";
                                                $row_prod = @mysqli_fetch_assoc($b_carro);
                                                $promocion = $row_productos['promocion'];
                                                $prom = "";
                                                if ($promocion == 1) {
                                                    $prom = "Promocion";
                                                }
                                                if (@$row_prod['cantidad'] != '') {
                                                    $texto = "Agregado" . " " . $row_prod['cantidad'];
                                                }

                                                ?>
                                                <span id="carro<?php echo $contador; ?>" class="btn btn-success btn-sm" style="font-size: 12px;"><?php echo $texto; ?>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <div class="<?php echo $prom; ?>"><?php echo $prom; ?></div>
                                    <div style="margin: 10px; padding: 5px;"><?php echo $row_productos['descripcion']; ?></div>
                                </div>
                            <?php $contador++;
                            } while ($row_productos = @mysqli_fetch_assoc($b_productos)); ?>

                        </ul>
                    </div>
                <?php } while ($row_subdepartamentos = mysqli_fetch_assoc($b_subdepartamentos)); ?>


            </div>
        </div>

        <div class="row">

            <div class="col-sm-3">
                <!--<h1>Super</h1>-->
            </div>
            <div class="col-sm-9">

            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <?php include('footer.php'); ?>
            </div>
        </div>



    </div>




    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
</body>

</html>