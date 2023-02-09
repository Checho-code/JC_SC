<?php
include('conexion/conexion.php');
session_start();
session_destroy();
echo"Sessions deleted successfully";
 ?>
