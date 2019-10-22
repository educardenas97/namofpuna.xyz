<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <?php
            session_start();
            include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
            $edicion=$_SESSION['edi_codigo'];
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
          <input type="button" value="Volver" onclick="window.location.href='../../login/main.php'" />
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
                                <?php crearTabla("SELECT act_codigo, act_fecha, act_nombre  FROM actividad WHERE edi_codigo = '".$edicion."' ") ?>
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>
    </body>
    <!-- Footer -->
    	<footer id="footer">
    		<section>
    			<h2>Instrucciones</h2>
    			<p>- Selecione una actividad <br> - Todas las actividades en pantalla pertenecen a la edicion actual</p>
    		</section>
    		<section>
    			<h2>Ayuda</h2>
    			<dl class="alt">
    				<dt>Address</dt>
    				<dd>&bull; Facultad Politecnica UNA &bull; San Lorenzo</dd>
    				<dt>Phone</dt>
    				<dd>0982 908 639</dd>
    				<dt>Email</dt>
    				<dd><a href="#">eduardocardenas97@gmail.com</a></dd>
    			</dl>
    			<ul class="icons">

    				<li><a href="https://www.facebook.com/%C3%91amomarandu-2037370486565235/" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
    				<li><a href="https://www.instagram.com/namofpuna/" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>


    			</ul>
    		</section>
    		<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
    	</footer>

    </div>
    </html>
    <?php
    function crearTabla($consulta){
        global $conexion;
        //echo $consulta."";
        $query=mysqli_query($conexion,$consulta);
        $tabla="";
        while($datos=mysqli_fetch_array($query)){
            $tabla.="<tr><td><input type='button' name='asistencia' value='".$datos[1]."' onclick='seleccionar(".$datos[0].")'></td><td>$datos[2]</td></tr>";
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
