<?php
    include("conexion.php");
    $consultas=new Consultas();
    $id=$_POST['id'];
    $valor=$_POST['asistencia'];
    $codigo=$_POST['codigo'];
    $fec=date("Y-m-d",time());

    if(isset($_POST['id'])){
        if($retorno>0){
            actualizarAsistencia($id,$valor);
            echo "0";
        }else{
            echo "1";
        }
    }

    function actualizarAsistencia($id,$valor){
        $query="DELETE FROM asistencia WHERE act_codigo='$valor' AND par_codigo='$id') ";
        echo $query;
        $consultas->conexion->query($query);
    }
 ?>
