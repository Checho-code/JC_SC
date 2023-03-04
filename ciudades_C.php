<?php

 include('conexion/conexion.php');

 $deptos=$_POST['dpto'];

 $sql= "SELECT * FROM  ciudades WHERE id_dpto = '$deptos'";

 $result = mysqli_query($conexion, $sql);

 $cadena="<label>Ciudades</label>
           <select id='city' name='city'>";

           while($ver = mysqli_fetch_row($result)){           
            $cadena = $cadena.'<option value='.$ver[0].'>'.($ver[1]).'</option>';
           }

           echo $cadena."</select>"; 
 ?>