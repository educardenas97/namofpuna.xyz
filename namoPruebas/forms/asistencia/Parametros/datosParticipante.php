<?php
include("conexion.php");
@$consultas=new Consultas();
@$campos=$_POST['campos'];
@$tabla=$_POST['tabla'];
@$campoC=$_POST['campoCondicion'];
@$valor=$_POST['valores'];
@$actCodigo=$_POST['actCod'];
$resultado=array(array($campos));
//echo "SELECT ".implode(",", $campos)." FROM  $tabla WHERE ".armarCondiciones($campoC,$valor)." AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo = participante.per_codigo AND persona.tp_codigo = '2'  ORDER BY persona.per_apellido ASC ";

$datos=$consultas->conexion->query("SELECT ".implode(",", $campos)." FROM  $tabla WHERE ".armarCondiciones($campoC,$valor)." AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo = participante.per_codigo AND (persona.tp_codigo = '1' OR persona.tp_codigo = '3')  ORDER BY persona.per_apellido ASC ");

while ($fila=$datos->fetch_row()) {
    $asis=$consultas->conexion->query("SELECT asi_codigo FROM asistencia WHERE act_codigo='$actCodigo'AND par_codigo='".$fila[0]."' ");
    //VERIFICAR SI TRAE VACIO PARA CARGAR 0  EN TODO CASO SE TRAERIRA EL CODIGO QUE CORRESPONDE A SU ASISTENCIA
    //echo "SELECT asi_codigo FROM asistencia WHERE act_codigo='$actCodigo'AND par_codigo='".$fila[0]."' ";
    $asis=$asis->fetch_row();

    $asis2=($asis[0]!=null)?$asis[0]:"0";
    //$asis2="test";
    array_push($fila,$asis[0]);
    array_push($resultado,$fila);
}

array_shift($resultado);

if(!(count($resultado)>0)){
    $resultado="";
}

echo json_encode(array_values($resultado),JSON_PRETTY_PRINT);

function armarCondiciones($campos,$valores){
    $res="";
    for ($i=0; $i <count($campos)-1 ; $i++) {
        $res.=$campos[$i]." = '".$valores[$i]."' AND ";
    }
    $res.=$campos[$i]." = '".$valores[$i]."' ";
    return $res;
}
/*SELECT * FROM participante,edicion,persona
WHERE participante.edi_codigo=$_SESSION[edi_codigo] AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo=participante.per_codigo
AND persona.tp_codigo=2 ORDER BY participante.par_codigo DESC";*/
?>
