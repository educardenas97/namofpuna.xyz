<?php
$aus_nombre=$_POST['nombre'];
$aus_correo=$_POST['email'];
$aus_telefono=$_POST['telefono'];
$band=0;

include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
$query="SELECT * FROM auspiciante ";
$res=mysqli_query($conexion,$query) or die(mysql_error());
  while($rows = mysqli_fetch_array($res)):
  $nombre=$rows['aus_nombre'];
  if ($aus_nombre==$nombre) {
    $band=1;
    break;
  }
  endwhile;
/////////////////
if ($band==0) {

    $sql="INSERT INTO auspiciante (aus_codigo,aus_nombre,aus_correo,aus_telefono)
    VALUES (null,'$aus_nombre','$aus_correo','$aus_telefono')";

    if(mysqli_query($conexion,$sql)){
          //Redirecciona a la pagina principal
         header('Location: ../../index.php');
    }else{
        echo"ERROR: Could not able to execute $sql.". mysqli($conexion);
    }

}else {
  echo "Auspiciante ya registrado";
}


?>
