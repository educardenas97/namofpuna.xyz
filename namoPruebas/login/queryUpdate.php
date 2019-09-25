<?php 
//Conexion//
require('conexion.php');
mysqli_set_charset($conexion,"utf8");
$ci=$_POST['ci'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$fecha_nac=$_POST['fecha_nac'];
$carrera=$_POST['carrera'];
$sexo=$_POST['sexo'];
$sql = "UPDATE persona SET per_nombre='$nombre',per_apellido='$apellido',per_telefono='$telefono',per_password='$pass',per_correo='$email',per_fecha_nac='$fecha_nac',car_codigo='$carrera',sex_codigo='$sexo' WHERE per_ci=$ci";

if(mysqli_query($conexion, $sql)){
    header("Location: update.php");
} else{
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
}

?>