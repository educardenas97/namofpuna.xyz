<!DOCTYPE HTML>
<!--
	En esta pagina tenemos las diferentes ediciones realizadas
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
				<h1>Ediciones</h1>
				<p>Ediciones realizadas y programadas hasta la fecha</p>
			</header>
			<!-- Main -->
				<div id="main">
					<!-- Content -->
						<section id="content" class="main">
							<div class="center gtr-uniform"><!--Formulario-->

								<table >
							<?php
										mostrarEdicion();
              ?>
							</table>

							</div>
              </section>
              </div>
              </div>
  <!-- Footer -->
  	<footer id="footer">
  		<section>
  			<h2>Instrucciones</h2>
  			<p>- Selecione una edición a configurar <br> - Una vez accedido a una edición encontrará los apartados configurables</p>
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
function mostrarEdicion() {
	include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
	$query="SELECT * FROM edicion ORDER BY edi_codigo DESC";
	$res=mysqli_query($conexion,$query) or die(mysql_error());
		while($rows = mysqli_fetch_array($res)):
			$codigo=$rows['edi_codigo'];
			$detalle=$rows['edi_detalle'];
				echo"<tr><td>$detalle</td>
				<td><form action='config.php' method='post'>
				<input name='edicion' type='hidden' value='$codigo'>
				<input name='edi_detalle' type='hidden' value='$detalle'>
				<input type='submit' class='button small' value='Configuración'>
				</form></td></tr>  ";
		endwhile;
}

 ?>
