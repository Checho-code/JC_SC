<?php
require('../conexion/conexion.php');


if (isset($_POST['btnEnviarPedido'])) {

	

		if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['numero']) && !empty($_POST['tel']) && !empty($_POST['direccion']) && ($_POST['dpto'] != "0") && ($_POST['ciudad'] != "0") && ($_POST['sector'] != "0") && !empty($_POST['observaciones'])) {


			$nombre = ($_POST['nombre']);
			$apellido = ($_POST['apellido']);
			$correo = ($_POST['correo']);
			$doc = ($_POST['numero']);
			$tel = ($_POST['tel']);
			$direccion = ($_POST['direccion']);
			$dpto = ($_POST['dpto']);
			$city = ($_POST['ciudad']);
			$sector = ($_POST['sector']);
			$obser = ($_POST['observaciones']);
			$rol = ($_POST['rol']);
			$idUs = ($_POST['idUser']);
			$total = ($_POST['total']);
			$idVendedor = '';
			if ($rol == "2") {
				$idVendedor = $idUs;
			} else {
				$idVendedor = '';
			}

			//validamos si el cliente esta registrado
			$verCli = mysqli_query($conexion, "SELECT idCliente  FROM clientes WHERE cedula = '$doc' AND correo = '$correo'");
			$row_cli = mysqli_fetch_assoc($verCli);
			$num_rowCli = mysqli_num_rows($verCli);
			$verCli->close();


			$fecha = date('Y-m-d');


			if ($num_rowCli > 0) {
				$idCli = $row_cli['idCliente'];
				//si cliente esta reg llenamos el pedido
				$stmt = $conexion->prepare("INSERT INTO pedidos (id_vendedor, idCliente, fecha, total_pedido, direccion, id_dpto, id_ciudad, id_sector, observacion) VALUES (?,?,?,?,?,?,?,?,?)");
				$stmt->bind_param('iisdsiiis', $idVendedor, $idCli, $fecha, $total, $direccion, $dpto, $city, $sector, $obser);
				$stmt->execute();
				$stmt->close();

				if ($stmt) {
					$ultimo_id = mysqli_insert_id($conexion);
					echo "id de pedido => " . $ultimo_id;
					echo "<br>";
					//actualizamos el carrito
					$update = ("UPDATE carrito SET idPedido  ='$ultimo_id', idCliente ='$idCli', estado  =1 WHERE id_usuario='$idUs' AND estado = 0");
					$result_update = mysqli_query($conexion, $update);


					if ($result_update > 0) {
?>
<script>
window.location.href = '../vistas/graciasPorCompra.php';
</script>
<?php

					}
				}
			} else {
				//sino esta reg, lo registramos
				$stmt = $conexion->prepare("INSERT INTO clientes ( nombre, apellido, cedula, correo, telefono, rol) VALUES (?,?,?,?,?,?)");
				$stmt->bind_param('sssssi', $nombre, $apellido, $doc, $correo, $tel, $rol);
				$stmt->execute();
				$stmt->close();

				if ($stmt) {
					//traemos el id cliente
					$idCli = mysqli_insert_id($conexion);

					// llenamos el pedido
					$stmt = $conexion->prepare("INSERT INTO pedidos (id_vendedor, idCliente, fecha, total_pedido, direccion, id_dpto, id_ciudad, id_sector, observacion) VALUES (?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param('iisdsiiis', $idVendedor, $idCli, $fecha, $total, $direccion, $dpto, $city, $sector, $obser);
					$stmt->execute();
					$stmt->close();

					if ($stmt) {
						//actualizamos el carrito
						$idPed = mysqli_insert_id($conexion);
						$update = ("UPDATE carrito SET idPedido  ='$idPed', idCliente ='$idCli', estado  =1 WHERE id_usuario='$idUs' AND estado = 0");
						$result_update = mysqli_query($conexion, $update);


						if ($result_update > 0) {
						?>
<script>
window.location.href = '../vistas/graciasPorCompra.php';
</script>
<?php

						}
					}
				}
			}
		} else {
			/**cerrar si no vacios */
			?>
<script>
Swal.fire({
    title: 'Ooopss...!',
    text: "Lo sentimos, debes completar todos los campos para realizar el proceso de registro, vuelve a intentarlo.!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Continuar'
})
</script>
<?php
		}
	
}
/**cerrar btnGuardar */

//Busco el registro de las noticias 
// $b_productos = mysqli_query($conexion, "SELECT * FROM productos ORDER BY id_producto");
// $dataProduct = mysqli_fetch_assoc($b_productos);