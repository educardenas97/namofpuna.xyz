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
            <?php
            mostrarCarrera();
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
function mostrarCarrera(){
  $c=0;
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $query="SELECT * FROM carrera ";
  $res=mysqli_query($conexion,$query) or die(mysql_error());
    while($rows = mysqli_fetch_array($res)):
        $codigo=$rows['car_codigo'];
        $descripcion=$rows['car_detalle'];
        $c++;
        echo"<tr><td>$c</td><td>$descripcion</td>
        <td><form action='asistencia_por_carrera.php' method='post'>
        <input name='carreraCodigo' type='hidden' value='$codigo'>
        <input name='carreraDescripcion' type='hidden' value='$descripcion'>
        <input type='submit' class='button small' value='Ver'>
        </form></td></tr>  ";
    endwhile;
}
?>
