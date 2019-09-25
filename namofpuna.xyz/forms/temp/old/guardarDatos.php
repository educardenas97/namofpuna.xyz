<?php
include('conexion.php');
$campos=$_POST['campos'];
$tabla=$_POST['tabla'];
$valores=$_POST['valores'];

if(isset($_POST['campos']) && isset($_POST['tabla'])&& isset($_POST['valores'])){
    $retorno=insertarDatos($campos,$tabla,$valores);
    if($retorno>0){
        echo "0";
    }else{
        echo "1";
    }
}
 ?>
