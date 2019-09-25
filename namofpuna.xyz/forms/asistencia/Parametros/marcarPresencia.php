<?php
    include("conexion.php");
    $consultas=new Consultas();
    $id=$_POST['id'];
    $valor=$_POST['asistencia'];
    $codigo=$_POST['codigo'];

    if(isset($_POST['id'])){
        $query="INSERT INTO asistencia VALUES (NULL,'$valor','$id')";
        echo $query;
        $consultas->conexion->query($query);
        echo "0";
    }else{
        echo "1";
    }




 ?>
