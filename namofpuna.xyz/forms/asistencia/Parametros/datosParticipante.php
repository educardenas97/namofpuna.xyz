<?php
include("conexion.php");
@$consultas=new Consultas();
@$campos=$_POST['campos'];
@$tabla=$_POST['tabla'];
@$campoC=$_POST['campoCondicion'];
@$valor=$_POST['valores'];
$resultado=array(array($campos));
//echo "SELECT ".implode(",", $campos)." FROM  $tabla WHERE ".armarCondiciones($campoC,$valor)." AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo = participante.per_codigo AND persona.tp_codigo = '2'  ORDER BY persona.per_apellido ASC ";

$datos=$consultas->conexion->query("SELECT ".implode(",", $campos)." FROM  $tabla WHERE ".armarCondiciones($campoC,$valor)." AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo = participante.per_codigo AND persona.tp_codigo = '2'  ORDER BY persona.per_apellido ASC ");

while ($fila=$datos->fetch_row()) {
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
