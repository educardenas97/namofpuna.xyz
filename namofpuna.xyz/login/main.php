<?php
//Conexion//
include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
mysqli_set_charset($conexion,"utf8");
//Login//
session_start();
if(!isset($_SESSION["ci"]))
{
	header ("Location: login.html");
	exit();
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>	Namofpuna</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
			<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<h1>Bienvenido</h1>
						<h2>Menu Principal</h2>
          </header>

				<!-- Main -->
					<div id="main">
						<!-- Content -->
							<section id="content" class="main">
								<div class="row">
										<div class="col-6 col-12-medium">
											<div class="col-12" style="text-align: left;" ><?php mostrarPersona($_SESSION['ci']) ?>
											<br>Funcion a desempeñar: <?php mostrarFuncion($_SESSION['fun_codigo']) ?></div>
										</div>
										<div class="col-6 col-12-medium">
											<div class="col-12" style="text-align: right;" >
	                        <ul class="actions stacked" >
	                            <li><a href="update.php" class="button">Actualizar Datos</a></li>
															<li><a href="../forms/asistencia/index.php" class="button">Asistencia</a></li>
	                            <?php
	                            if( $_SESSION['level']==3 )//staff
	                            {
	                                echo" <li><a href='../forms/edicion/index.php' class='button'>Ediciones</a></li> ";
	                            }
	                            else if( $_SESSION['level']==1 )//voluntario
	                            {
	                                echo" <li><a href='../forms/participante/index.php' class='button'>Registrar</a></li> ";
	                            }
	                            ?>
															<li><a href='logout.php' class='button primary'>Salir</a></li>
	                        </ul>
											</div>
								    </div>
								</div>
							</section>

					</div>

				<!-- Footer -->
				<footer id="footer">
				<section>
				<h2>Indicaciones</h2>
				<p>- Actualizar Datos: En este apartado podemos modificar los datos de nuestro perfil (Nombre, Apellido, Edad, Contraseña, etc...) <br>
					- Registrar Participante: Aqui podemos registrar a un participante nuevo <br>
					- Asistencia: Apartado que nos ayuda a marcar la asistencia de los participantes
				</p>
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php
function mostrarPersona($ci){
	include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
	$query2="SELECT * FROM persona WHERE per_ci=$ci ";
	$res2=mysqli_query($conexion,$query2) or die(mysql_error());
		while($rows2 = mysqli_fetch_array($res2)):
			$personaNombre=$rows2['per_nombre'];
			$personaApellido=$rows2['per_apellido'];
			echo "<h2>$personaNombre $personaApellido</h2>";
			mostrarTipoPersona($rows2['tp_codigo']);
	endwhile;
}

function mostrarFuncion($funcionCodigo){
	include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $query3="SELECT * FROM funcion WHERE fun_codigo=$funcionCodigo";
  $res3=mysqli_query($conexion,$query3) or die(mysql_error());
    while($rows3 = mysqli_fetch_array($res3)):
      $detalle=$rows3['fun_detalle'];
			$descripcion=$rows3['fun_descripcion'];
			echo "$detalle
			<blockquote>$descripcion</blockquote>";
    endwhile;
}

function mostrarTipoPersona($tpCodigo){
  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
  $query="SELECT * FROM tip_persona WHERE tp_codigo=$tpCodigo";
  $res=mysqli_query($conexion,$query) or die(mysql_error());
    while($rows = mysqli_fetch_array($res)):
        $tpDetalle=$rows['tp_detalle'];
        echo"<code>$tpDetalle</code><br>";
    endwhile;
}
 ?>
