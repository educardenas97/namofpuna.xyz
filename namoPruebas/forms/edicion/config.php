<!DOCTYPE HTML>
<!--
	Menu de configuración de la edicion
-->
<html>
	<head>
		<title>Namofpuna</title>
		<link rel="icon" type="image/ico" href="../../images/favicon.ico"/>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

	<!-- Wrapper -->
		<div id="wrapper">
			<header id="header">
        <h1>
        <?php
				session_start();
				$_SESSION["detalle"] = $_POST['edi_detalle'];
        $_SESSION["edi_codigo"] = $_POST['edicion'];
        print "$_SESSION[detalle]";
        ?>
        </h1>
				<p>Menu de configuración</p>
				<a href="index.php" class="button small">Volver al inicio</a>
			</header>
			<!-- Main -->
				<div id="main">
					<!-- Content -->
						<section id="content" class="main">
							<div class="center gtr-uniform"><!--Formulario-->
							<table>
                <tr><td>
									<h2>Voluntarios</h2>
									<li>Inscriptos:<?php contarVoluntarios(); ?></li>
									<ul class="actions">
												<li><a href="../voluntario" class="button primary small icon solid fa-upload">Agregar</a></li>
												<li><a href="../voluntario/view.php" class="button small">Ver</a></li>
									</ul>
								</td>
                <td><h2>Participantes</h2>
									<li>Inscriptos:<?php contarParticipantes(); ?></li>
									<ul class="actions">
                    <li><a href="../participante" class="button primary small icon solid fa-upload">Agregar</a></li>
                    <li><a href="../participante/view.php" class="button small">Ver</a></li>
									</ul>
              	</td></tr>

                <tr><td>
									<h2>Funciones</h2>
                	<ul class="actions">
	                  <li><a href="../funcion/funcion.php" class="primary button small">Asignar</a></li>
	                  <li><a href="../funcion/agregar_funcion.php" class="button small">Agregar</a></li>
									</ul>
								</td>

                <td><h2>Actividaddes</h2>
                <ul class="actions">
                  <li><a href="" class="button primary small disabled">Agregar</a></li>
                  <li><a href="" class="button small disabled">Ver</a></li>
                </ul>
								</td></tr>
              </table>
							</div>
              </section>
              </div>
              </div>
  <!-- Footer -->
  	<footer id="footer">
  		<section>
  			<!--<h2>Instrucciones</h2>
  			<p></p>-->
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
    function contarVoluntarios() {
			$contar=0;
			include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
      $query="SELECT * FROM participante,edicion,persona
      WHERE participante.edi_codigo=$_SESSION[edi_codigo] AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo=participante.per_codigo
      AND (persona.tp_codigo=1 OR persona.tp_codigo=3) ";
			$res=mysqli_query($conexion,$query) or die(mysql_error());
				while($rows = mysqli_fetch_array($res)):
						$personaCodigo=$rows['per_codigo'];
						$query2="SELECT * FROM persona WHERE per_codigo=$personaCodigo";
						$res2=mysqli_query($conexion,$query2) or die(mysql_error());
							while($rows2 = mysqli_fetch_array($res2)):
									$contar++;
						endwhile;
				endwhile;
				echo " $contar";
    }

    function contarParticipantes() {
			$contar=0;
			include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
      $query="SELECT * FROM participante,edicion,persona
      WHERE participante.edi_codigo=$_SESSION[edi_codigo] AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo=participante.per_codigo
      AND persona.tp_codigo=2";
      $res=mysqli_query($conexion,$query) or die(mysql_error());
				while($rows = mysqli_fetch_array($res)):
            $personaCodigo=$rows['per_codigo'];
            $query2="SELECT * FROM persona WHERE per_codigo=$personaCodigo";
            $res2=mysqli_query($conexion,$query2) or die(mysql_error());
              while($rows2 = mysqli_fetch_array($res2)):
                	$contar++;
            endwhile;
        endwhile;
				echo " $contar";
    }
  ?>
