<?php
$per_nombre=$_POST['nombre'];
$per_apellido=$_POST['apellido'];
$per_ci=$_POST['ci'];
$per_correo=$_POST['email'];
$per_fecha_nac=$_POST['nacimiento'];
$per_password="0000"; //Contraseña por defecto (para proximos usos)
$sex_codigo=$_POST['sexo'];
$tp_codigo=$_POST['persona'];

include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
session_start();
//////Funciones/////////
function traerCodigoPersona($ci){
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $query2="SELECT * FROM persona WHERE per_ci=$ci";
  $res2=mysqli_query($conexion,$query2) or die(mysql_error());
    while($rows2 = mysqli_fetch_array($res2)):
        $personaCodigo2=$rows2['per_codigo'];
        return $personaCodigo2;
    endwhile;
}

function registrarParticipante($personaCodigo2){
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  session_start();
  $sql3="INSERT INTO participante (par_codigo,per_codigo,edi_codigo)
  VALUES (null,'$personaCodigo2','$_SESSION[edi_codigo]')";
  if(mysqli_query($conexion,$sql3)){
      header('Location: index.php');
  }else{
      echo"ERROR: Could not able to execute $sql3.". mysqli($conexion);
  }
}

function buscarParticipante($pCodigo,$eCodigo){
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $query4="SELECT * FROM participante WHERE per_codigo=$pCodigo AND edi_codigo=$eCodigo";
  $res4=mysqli_query($conexion,$query4) or die(mysql_error());
    while($rows4 = mysqli_fetch_array($res4)):
        $personaCodigo4=$rows4['per_codigo'];
        return $personaCodigo4;
    endwhile;
}
///////////////////////

//Comprobamos que no exista registro de la persona
if (traerCodigoPersona($per_ci)) {
    $personaCodigo=traerCodigoPersona($per_ci);
    if(buscarParticipante($personaCodigo,$_SESSION[edi_codigo])){
        echo "Persona ya registrada en esta edición";
    }else {
      registrarParticipante($personaCodigo);
    }
}
else {
  $sql="INSERT INTO persona (per_codigo,per_nombre,per_apellido,per_ci,per_password,per_correo,per_fecha_nac,sex_codigo,tp_codigo)
    VALUES (null,'$per_nombre','$per_apellido','$per_ci','$per_password','$per_correo','$per_fecha_nac','$sex_codigo','$tp_codigo')";
    if(mysqli_query($conexion,$sql)){
          $personaCodigo=traerCodigoPersona($per_ci);
          registrarParticipante($personaCodigo);
    }else{
        echo"ERROR: Could not able to execute $sql.". mysqli($conexion);
    }
}


?>
