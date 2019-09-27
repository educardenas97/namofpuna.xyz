<?php
ini_set('session.gc_maxlifetime',3600);
session_set_cookie_params(3600);
session_start();

//Formulario//
$ci=$_POST['ci'];
$pass=$_POST['pass'];
//Conexion//
require('conexion.php');
mysqli_set_charset($conexion,"utf8");

//Query//
$query="SELECT * FROM persona where per_ci='$ci' AND per_password='$pass' AND ( tp_codigo=1 OR tp_codigo=3 ) ";
$result=mysqli_query($conexion,$query) or die(mysql_error());

//Verificacion//
$rows = mysqli_num_rows($result);
//Traemos su tipo de persona//
while( $res = mysqli_fetch_array($result) )
{
	  $level=$res['tp_codigo'];

}
//aqui se hace la magia//
if( $rows==1 )
{
    $_SESSION['ci'] = $ci;
    $_SESSION['level'] = $level;
    header("Location: main.php");
   
}else
{
    header("Location: login.html");
}

mysqli_close($conexion);
?>