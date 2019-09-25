<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <title>Namofpuna</title>
        <?php
            //$codigo=$_POST['edicion'];
            $codigo=5;
            $actividad=$_POST['asistencia'];
         ?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <?php
            include('Parametros/conexion.php');
            $consultas=new Consultas();
         ?>
        <meta charset="utf-8">
    </head>
    <body class="is-preload">
        <!-- Wrapper -->
			<div id="wrapper">
                <header id="header">
					<h1>Registrar Asistencia</h1>
				</header>
                <div id='main'>
                    <section id='content' class='main'>
                        <div class="center gtr-uniform">
                            <input type="hidden" name="codigo" id='codigo' value=<?php echo "'$codigo'"; ?>>
                            <input type="hidden" name="actividad" id='actividad' value=<?php echo "'$actividad'"; ?>>
                            <!--<select class="" name="codigo">

                            </select>-->
                            <table>
                                <tbody id='participantes'>

                                </tbody>
                            </table>
                        </div>

                    </section>
                </div>


    </body>
    <script>
        function consultar(){
            //var camposP=['par_codigo','(select per_nombre from persona where persona.per_codigo= participante.per_codigo AND (tp_codigo=3 OR tp_codigo=1))  ','(select per_apellido from persona where persona.per_codigo= participante.per_codigo AND (tp_codigo=3 OR tp_codigo=1))  '];
            var camposP=['participante.par_codigo','persona.per_nombre','persona.per_apellido'];
            var camposCond=['participante.edi_codigo'];
            var valoresCond=[$("#codigo").val()]
            var idEdicion=$("#codigo").val();
            //alert("consultar");
            $.post("Parametros/datosParticipante.php",{campos:camposP,tabla:"participante,persona,edicion",campoCondicion:camposCond,valores:valoresCond}, function(resultado) {
                console.log(resultado);
                var res=JSON.parse(resultado);
                for(var i=0;i<res.length;i++){
                    if(res[i][1]!=null && res[i][1]!='null'){
                        crearTabla(res[i])
                    }
                }
             });
        }
        function crearTabla(datos){
            var aux="test";
            var row=document.createElement('tr');
            var estado=document.createElement('td');
            estado.className='etiqueta';
            /*if(verificarPresencia(datos[0])){
                aux="presente";
                estado.innerHTML=aux;
                row.addEventListener('click',function() { eliminar(datos[0])})
                row.style.backgroundColor='#90ec90'
            }else{
                row.addEventListener('click',function() { insertar(datos[0])})
                aux="ausente";
                estado.innerHTML=aux;
            }*/
            row.className=aux+" eventoMouse";

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
            row.appendChild(estado);
        }
        function insertar(id){
            var codigo=$("#codigo").val();
            var idAct=$("#actividad").val();
            //alert(id);
            $("#participantes").empty();
             $.post("Parametros/marcarPresencia.php",{id:id,codigo:codigo , asistencia:idAct}, function(resultado) {
                 console.log(resultado);
              });
             consultar();
        }
        function eliminar(id){
            var codigo=$("#codigo").val();
            var idAct=$("#actividad").val();
            //alert(id);
            $("#participantes").empty();
             $.post("Parametros/eliminar.php",{id:id,codigo:codigo , asistencia:idAct}, function(resultado) {
                 console.log(resultado);
              });
             consultar();
        }
        function verificarPresencia(id){
            var camposCondicion=['act_codigo','par_codigo']
            var valores=[$("#actividad").val(),id];
            var campoConsulta=['asi_codigo'];
            var valor="";
            $.ajaxSetup({async:false});
            $.post("Parametros/obtenerDatos.php",{campos:campoConsulta,tabla:"asistencia",campoCondicion:camposCondicion,valores:valores}, function(resultado) {
                console.log(resultado);
                if( resultado == null || resultado == "null"){
                    valor="";
                }else{
                    console.log("ingreso a comprobacion");
                    var res=JSON.parse(resultado);
                    valor=res[0];
                }
             });
             $.ajaxSetup({async:true});
             return valor;
        }
        consultar();
    </script>
</html>
