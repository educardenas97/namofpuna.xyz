<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <?php
            //$codigo=$_POST['codigo'];
            $codigo='5';
         ?>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
            <input type="hidden" name="codigo" id='codigo' value=<<?php echo "'$codigo'"; ?>>
            <table>
                <thead>
                    <tr>
                        <th>Nombre </th>
                        <th>Apellido</th>
                    </tr>
                </thead>
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
        if(datos==1){
            aux="presente";
        }else{
            aux="ausente";
        }
        var row=document.createElement('tr');
        row.className=aux;
        var colum1=document.createElement('td');
        colum1.innerHTML=datos[1];
        var colum2=document.createElement('td');
        colum2.innerHTML=datos[2];
        var valor=document.createElement("input");
        valor.type='hidden';
        valor.value=datos[3];
        row.addEventListener('click',function { actualizar(id,(datos==0)?1:0)})
        document.getElementById('tablaGavetas').appendChild(row);
        row.appendChild(colum1);
        row.appendChild(colum2);
    }
    function actualizar(id, asistencia){
        var codigo=$("#codigo").val();
        $.post("Parametros/actualizarLista.php",{id:id,codigo:codigo , asistencia:asistencia}, function(resultado) {
            console.log(resultado);
         });
         consultar();
    }
    consultar();
    </script>
</html>
