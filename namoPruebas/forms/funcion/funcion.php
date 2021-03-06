<!DOCTYPE HTML>
<!--
	Pagina para asignar funciones a los voluntarios
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
					<p><?php
					session_start();
					print "Asignar para la $_SESSION[detalle]";
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
					<div class="center gtr-uniform"> <!--Formulario-->
            <table><?php
              mostrarVoluntarios();
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
<?php
function mostrarVoluntarios(){
include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
$query="SELECT * FROM participante,edicion,persona
WHERE participante.edi_codigo=$_SESSION[edi_codigo] AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo=participante.per_codigo
AND (persona.tp_codigo=1 OR persona.tp_codigo=3) ORDER BY persona.per_apellido ASC";
$res=mysqli_query($conexion,$query) or die(mysql_error());
  while($rows = mysqli_fetch_array($res)):
      $personaCodigo=$rows['per_codigo'];
			$funCodigo=$rows['fun_codigo'];
      $query2="SELECT * FROM persona WHERE per_codigo=$personaCodigo ";
      $res2=mysqli_query($conexion,$query2) or die(mysql_error());
        while($rows2 = mysqli_fetch_array($res2)):
          //$personaCi=$rows2['per_ci'];
          $personaNombre=$rows2['per_nombre'];
          $personaApellido=$rows2['per_apellido'];
          $personaCarrera=$rows2['car_codigo'];
					$tpCodigo=$rows['tp_codigo'];
          $carreraNombre=mostrarCarrera($personaCarrera);
					//$tipPersona=mostrarTipoPersona($tpCodigo);
					$funcion=mostrarFuncion($funCodigo);
          echo "<tr><td>
              <form action='asignar.php' method='post'>
              <input type='hidden' name='perCodigo' value='$personaCodigo'>
              <input type='submit' value='Asignar' class='button small'>
              </form></td>
							<td>$personaApellido</td><td>$personaNombre</td><td>$carreraNombre</td><td>$funcion</td></tr>";
      endwhile;
  endwhile;
}

function mostrarTipoPersona($tpCodigo){
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $query="SELECT * FROM tip_persona WHERE tp_codigo=$tpCodigo";
  $res=mysqli_query($conexion,$query) or die(mysql_error());
    while($rows = mysqli_fetch_array($res)):
        $tpDetalle=$rows['tp_detalle'];
        return $tpDetalle;
    endwhile;
}

function mostrarFuncion($funcionCodigo){
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $query="SELECT * FROM funcion WHERE fun_codigo=$funcionCodigo";
  $res=mysqli_query($conexion,$query) or die(mysql_error());
    while($rows = mysqli_fetch_array($res)):
        $funDetalle=$rows['fun_detalle']; //funcion que desempenha la persona
        return $funDetalle;
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
