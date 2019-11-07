<?php
    include("conexion.php");
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
        $query="UPDATE asistencia SET asis='$valor' , WHERE id='$id' and fecha=$fec";
    }




 ?>
