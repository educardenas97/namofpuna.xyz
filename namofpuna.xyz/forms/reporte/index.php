<!DOCTYPE HTML>
<!--
	Pagina para visualizar los voluntarios y su asistencia durante la edicion
-->
<html>
	<head>
		<title>Namofpuna</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<header id="header">
					<h1>Lista de Presencia</h1>
					<p><?php
					session_start();
					print "$_SESSION[detalle]";
					?>
					</p>
					<?php
					 echo"<form action='../edicion/config.php' method='post'>
					<input name='edicion' type='hidden' value='$_SESSION[edi_codigo]'>
					<input name='edi_detalle' type='hidden' value='$_SESSION[detalle]'>
					<input type='submit' class='button small' value='Volver'>
					</form>";?>
				</header>



			<!-- Main -->
			<div id="main">
			<!-- Content -->
				<section id="content" class="main">
					<div class="center gtr-uniform"><!--Formulario-->
            <table>
            <center><tr><th>N</td><th>CI</td><th>APELLIDO</th><th>NOMBRE</th><th>CARRERA</th><th>HS EXT</th></tr></center>
            <?php
            mostrarAsistencia();
            ?></table>
          </div>
          </section>
        </div>
      <!-- Footer -->
      <footer id="footer">
      <section>
      <h2>Indicaciones</h2>
      <p>- En este apartado se encuentran todos los voluntarios para esta edición <br>-	Están en orden alfabetico por apellidos</p>
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

      <!-- Scripts -->
      <script src="../../assets/js/jquery.min.js"></script>
      <script src="../../assets/js/jquery.scrollex.min.js"></script>
      <script src="../../assets/js/jquery.scrolly.min.js"></script>
      <script src="../../assets/js/browser.min.js"></script>
      <script src="../../assets/js/breakpoints.min.js"></script>
      <script src="../../assets/js/util.js"></script>
      <script src="../../assets/js/main.js"></script>

      </body>
</html>
<?php
  function mostrarAsistencia(){
    $ACTIVIDAD=7; //Actividad excluida del filtro
    $TP_PERSONA=2; //participantes
    $c=0;
    include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
    $query="SELECT persona.per_ci,persona.per_apellido,persona.per_nombre,carrera.car_codigo,tip_persona.tp_codigo FROM persona
            INNER JOIN (participante,asistencia,actividad,edicion,tip_persona,carrera)
            ON (persona.per_codigo=participante.per_codigo
                AND persona.tp_codigo=tip_persona.tp_codigo
                AND tip_persona.tp_codigo<>$TP_PERSONA
                AND carrera.car_codigo=persona.car_codigo
                AND participante.par_codigo=asistencia.par_codigo
                AND asistencia.act_codigo=actividad.act_codigo
                AND actividad.edi_codigo=edicion.edi_codigo
                AND edicion.edi_codigo=$_SESSION[edi_codigo]
               	AND actividad.act_codigo<>$ACTIVIDAD)
            GROUP BY persona.per_codigo
            ORDER BY(persona.per_apellido) ASC";
    $res=mysqli_query($conexion,$query) or die(mysql_error());
    while($rows = mysqli_fetch_array($res)):
        $nombre=$rows['per_nombre'];
        $ci=$rows['per_ci'];
        $apellido=$rows['per_apellido'];
        $carrera=$rows['car_codigo'];
				$tpPersona=$rows['tp_codigo'];
        $carreraNombre=mostrarCarrera($carrera);
        $c++;
				if ($tpPersona==3) {
					echo "<tr><td>$c</td><td>$ci</td><td>$apellido</td><td>$nombre</td><td>$carreraNombre</td><td>30</td></tr>";
				}
				else {
					echo "<tr><td>$c</td><td>$ci</td><td>$apellido</td><td>$nombre</td><td>$carreraNombre</td><td>10</td></tr>";
				}

    endwhile;
  }

  function mostrarCarrera($carreraCodigo){
    include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
    $query="SELECT * FROM carrera WHERE car_codigo=$carreraCodigo";
    $res=mysqli_query($conexion,$query) or die(mysql_error());
      while($rows = mysqli_fetch_array($res)):
          $descripcion=$rows['car_detalle'];
          return $descripcion;
      endwhile;
  }
 ?>
