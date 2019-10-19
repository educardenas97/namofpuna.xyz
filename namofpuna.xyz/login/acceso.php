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
//Traemos su tipo de persona//
while( $res = mysqli_fetch_array($result) )
{
	  $level=$res['tp_codigo'];
		$personaCodigo=$res['per_codigo'];
}
//aqui se hace la magia//
if( $rows==1 )
{
    $_SESSION['ci'] = $ci;
    $_SESSION['level'] = $level;
		$_SESSION['per_codigo']  = $personaCodigo;
		sessionEdicion($personaCodigo);
    header("Location: main.php");

}else
{
    header("Location: login.html");
}

mysqli_close($conexion);

//corregir esta funcion
function sessionEdicion($personaCodigo){
	include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
	$query="SELECT participante.edi_codigo as codigo,participante.fun_codigo as funcion FROM participante,persona,edicion
	WHERE participante.per_codigo='$personaCodigo'
	AND participante.edi_codigo=edicion.edi_codigo
	AND persona.per_codigo=participante.per_codigo
	ORDER BY participante.edi_codigo DESC";
	$res=mysqli_query($conexion,$query);
	while($rows = mysqli_fetch_assoc($res)):
			print_r($rows);
			$codigoEdicion=$rows['codigo'];
			$_SESSION['fun_codigo'] = $rows['funcion'];

			$query2="SELECT * FROM edicion WHERE edi_codigo=$codigoEdicion";
			$res2=mysqli_query($conexion,$query2) or die(mysql_error());
			while($rows2 = mysqli_fetch_array($res2)):
					$_SESSION['edi_codigo'] = $rows2['edi_codigo'];
					$_SESSION['detalle'] = $rows2['edi_detalle'];
					break;
			endwhile;
			break;
	endwhile;
}

?>
