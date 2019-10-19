<?php
include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
$codigo=$_POST['codigo2'];
$descripcion=$_POST['descripcion2'];
$sql="UPDATE colegio SET col_descripcion='$descripcion' where col_codigo='$codigo'";  
if(mysqli_query($conexion,$sql)){
		header('Location: index.php');
}else{
    echo"ERROR: Could not able to execute $sql.". mysqli($conexion);
}

?>