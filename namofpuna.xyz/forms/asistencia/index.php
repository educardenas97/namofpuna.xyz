<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <?php
            include("../../../conexion.php");
            $edicion=5;
        ?>
        <title>Namofpuna</title>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <style media="screen">
            .eventoMouse{
                cursor:pointer;
            }
            .presente{
                background-color: #90ec90;
            }
        </style>
    </head>
    <body class="is-preload">
        <!-- Wrapper -->
			<div id="wrapper">
                <header id="header">
					<h1>Seleccionar Actividad</h1>
				</header>
                <div id='main'>
                    <section id='content' class='main' >
                        <form id='form' class="" action="asistencia.php" method="post">

                            <input type="hidden" name="asistencia" value="" id='asistenciaID'>
                        <!--    <select class="" name="participantes">
                                <option value="1">Voluntarios</option>
                                <option value="2">Participantes</option>
                            </select>-->
                        </form>
                        <table>
                            <tbody id='actividadesCuerpo'>
                                <?php crearTabla("SELECT act_codigo, act_fecha  FROM actividad WHERE edi_codigo = '".$edicion."' ") ?>
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>
    </body>
    <?php
    function crearTabla($consulta){
        global $conexion;
        //echo $consulta."";
        $query=mysqli_query($conexion,$consulta);
        $tabla="";
        while($datos=mysqli_fetch_array($query)){
            $tabla.="<tr><td><input type='button' name='asistencia' value='".$datos[1]."' onclick='seleccionar(".$datos[0].")'></td></tr>";
        }
        echo $tabla;
    }
    ?>
    <script>
        function seleccionar(id){
            document.getElementById('asistenciaID').value=id;
            document.getElementById('form').submit();
        }
    </script>
</html>
