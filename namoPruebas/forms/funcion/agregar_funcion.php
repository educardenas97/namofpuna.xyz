<!DOCTYPE HTML>
<!--
  Pagina para el registro de nuevas funciones (trabajos)
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
					<h1>Funciones</h1>
					<p>Trabajos a realizar durante la <?php
					session_start();
					print "$_SESSION[detalle]";
					?></p>
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
									<!--<li><a href="../../" class="button primary">Volver</a></li>-->
                  <h2>Agregar</h2>
                  <?php
                  echo "<form action='action.php' method='POST'>
                  Titulo de la funcion<br>
                  <input type='hidden' name='accion' value='agregar'>
                  <input type='text' name='detalle' placeholder='Instructor' required><br>
                  Description breve<br>
                  <sup>Obs: La descripcion debe ser un mensaje generalizado, que indique de manera especifica la funcion a realizar el voluntario.</sup>
                  <textarea name='descripcion' placeholder='El instructor es aquel que orienta al alumno en las diferentes lecciones explicadas' ></textarea><br>
                  <input type='submit' value='Agregar' class='button fit primary'>
                  ";

                  ?>
                </div>
                </section>

                <section id="content" class="main">
                <div class="center gtr-uniform"><!--Formulario-->
                <tread>
                <tr><td><h2>Funciones </h2></td></tr>
                <table><?php mostrarFunciones();?></table>
                </tread>
                </div>
                </section>
                </div>
                </div>


<!-- Footer -->
	<footer id="footer">
		<section>
			<h2>Instrucciones</h2>
			<p>Primera letra en mayuscula<br>
      La descripcion puede ser leida por todos los voluntarios</p>
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
<?php
function mostrarFunciones(){
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $cont=0;
  $query2="SELECT * FROM funcion";
  $res2=mysqli_query($conexion,$query2) or die(mysql_error());
    while($rows2 = mysqli_fetch_array($res2)):
      $fun_codigo=$rows2['fun_codigo'];
      $fun_detalle=$rows2['fun_detalle'];
      $fun_descripcion=$rows2['fun_descripcion'];
      $cont++;
      echo "<tr><td>$cont</td><td>$fun_detalle</td><td>$fun_descripcion</td></tr>";
    endwhile;
}
?>
