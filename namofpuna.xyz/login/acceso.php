<?php
ini_set('session.gc_maxlifetime',3600);
session_set_cookie_params(3600);
session_start();

//Formulario//
$ci=$_POST['ci'];
$pass=$_POST['pass'];
//Conexion//
include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
mysqli_set_charset($conexion,"utf8");

//Query//
$query="SELECT * FROM persona where per_ci='$ci' AND per_password='$pass' AND ( tp_codigo=1 OR tp_codigo=3 ) ";
$result=mysqli_query($conexion,$query) or die(mysql_error());

//Verificacion//
$rows = mysqli_num_rows($result);

if( $rows==1 )
{
    $_SESSION['ci'] = $ci;
    header("Location: update.php");

}else
{
    header("Location: login.html");
}

mysqli_close($conexion);
?>
