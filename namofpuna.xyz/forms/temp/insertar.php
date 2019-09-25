<?php
	$conexion=mysqli_connect('u713209196_namofpuna','educardenas97','','u713209196_namo');

	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];

	$sql="INSERT into auspiciante (aus_detalle,aus_correo,aus_telefono)
			values ('$nombre','$correo','$telefono')";
	echo mysqli_query($conexion,$sql);
 ?>
