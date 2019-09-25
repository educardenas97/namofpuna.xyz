<?php
$accion=$_POST['accion'];
switch ($accion) {
   case 'agregar':
      $detalle=$_POST['detalle'];
      $descripcion=$_POST['descripcion'];
      agregarFuncion($detalle,$descripcion);
     break;
  case 'asignar':
      $perCodigo=$_POST['perCodigo'];
      $funCodigo=$_POST['funcion'];
      asignarFuncion($perCodigo,$funCodigo);
     break;

}

/////Funciones/////
function asignarFuncion($perCodigo,$funCodigo){
  session_start();
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $sql="UPDATE participante SET fun_codigo = $funCodigo
  WHERE participante.per_codigo = $perCodigo AND participante.edi_codigo = $_SESSION[edi_codigo]";
  if(mysqli_query($conexion,$sql)){
      header('Location: funcion.php');
  }else{
      echo"ERROR: Could not able to execute $sql.". mysqli($conexion);
  }
}


function agregarFuncion($funDetalle,$funDescripcion){
    include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
    $sql="INSERT INTO funcion (fun_codigo,fun_detalle,fun_descripcion)
    VALUES (null,'$funDetalle','$funDescripcion')";
    if(mysqli_query($conexion,$sql)){
        header('Location: agregar_funcion.php');
    }else{
        echo"ERROR: Could not able to execute $sql.". mysqli($conexion);
    }
}
?>
