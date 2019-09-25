<?php
include("conexion.php");
@$consultas=new Consultas();
@$campos=$_POST['campos'];
@$tabla=$_POST['tabla'];
@$campoC=$_POST['campoCondicion'];
@$valor=$_POST['valores'];
@$orden=((isset($_POST['orden']))?$_POST['orden']:"");
$resultado=array(array($campos));
$datos=$consultas->consultarDatosQ($campos,$tabla,$orden,$campoC,$valor);
while ($fila=$datos->fetch_row()) {
    array_push($resultado,$fila);
}
array_shift($resultado);
if(!(count($resultado)>0)){
    $resultado="";
}
echo json_encode(array_values($resultado),JSON_PRETTY_PRINT);

/*SELECT * FROM participante,edicion,persona
WHERE participante.edi_codigo=$_SESSION[edi_codigo] AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo=participante.per_codigo
AND persona.tp_codigo=2 ORDER BY participante.par_codigo DESC";*/
?>
