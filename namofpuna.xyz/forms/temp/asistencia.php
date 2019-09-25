<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <?php
            //$codigo=$_POST['codigo'];
            $codigo='5';
            $actividad='1';
         ?>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
            <input type="hidden" name="codigo" id='codigo' value=<?php echo "'$codigo'"; ?>>
            <input type="hidden" name="actividad" id='actividad' value=<?php echo "'$actividad'"; ?>>
            <table>
                <thead>
                    <tr>
                        <th>Nombre </th>
                        <th>Apellido</th>
                    </tr>
                </thead>
                <tbody id="participantes">

                </tbody>
            </table>

    </body>
    <script>
    function consultar(){
        var camposP=['par_codigo','(select per_nombre from persona where persona.per_codigo= participante.per_codigo)  ','(select per_apellido from persona where persona.per_codigo= participante.per_codigo)  '];
        var idEdicion=$("#codigo").val();
        $.post("Parametros/obtenerDatos.php",{campos:camposP,tabla:"participante",campoCondicion:'edi_codigo',valores:idEdicion}, function(resultado) {
            console.log(resultado);
            var res=JSON.parse(resultado);
            for(var i=0;i<res.length;i++){
                crearTabla(res[i])
            }
         });
    }
    function crearTabla(datos){
        var aux;
        var row=document.createElement('tr');
        if(datos==1){
            aux="presente";
            row.addEventListener('click',function() { eliminar(datos[0])})
        }else{
            row.addEventListener('click',function() { insertar(datos[0])})
            aux="ausente";
        }
        row.className=aux;
        var colum1=document.createElement('td');
        colum1.innerHTML=datos[1];
        var colum2=document.createElement('td');
        colum2.innerHTML=datos[2];
        var valor=document.createElement("input");
        valor.type='hidden';
        valor.value=datos[3];
        document.getElementById('participantes').appendChild(row);
        row.appendChild(colum1);
        row.appendChild(colum2);
    }
    function insertar(id){
        var codigo=$("#codigo").val();
        var idAct=$("#actividad").val();
        alert(id);
        $("#participantes").empty();
         $.post("Parametros/marcarPresencia.php",{id:id,codigo:codigo , asistencia:idAct}, function(resultado) {
             console.log(resultado);
          });
         consultar();
    }
    function eliminar(id){
        var codigo=$("#codigo").val();
        var idAct=$("#actividad").val();
        alert(id);
        $("#participantes").empty();
         $.post("Parametros/eliminar.php",{id:id,codigo:codigo , asistencia:idAct}, function(resultado) {
             console.log(resultado);
          });
         consultar();
    }
    function verificarPresencia(){
        var campos=["asi_codigo"]
        $.post("Parametros/obtenerDatos.php",{campos:camposP,tabla:"asistencia",campoCondicion:'edi_codigo',valores:idEdicion}, function(resultado) {
            console.log(resultado);
            var res=JSON.parse(resultado);
            for(var i=0;i<res.length;i++){
                crearTabla(res[i])
            }
         });
    }
    consultar();
    </script>
</html>
