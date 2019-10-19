<!DOCTYPE HTML>
<!--
	Pagina para el registro de personas (alumnos,Voluntarios,etc)
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
					<h1>Registrar Voluntario</h1>
					<p><?php
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
									<?php

									  echo "<form action='action.php' method='POST'>
										Nombres<br>
									  <input type='text' name='nombre' required placeholder='Eduardo David *'><br>
										Apellidos<br>
									  <input type='text' name='apellido' required placeholder='Gomez Cardenas *'><br>
										Numero de documento<br>
										<input type='text' name='ci' placeholder='1855725'><br>
										Correo electronico<br>
									  <input type='email' name='email' placeholder='Email'><br>
										Nro de telefono<br>
									  <input type='text' name='telefono' placeholder='0982908123'><br>
										Fecha de nacimiento:<br>
									  <input type='date' name='nacimiento' placeholder='Fecha'><br>
										";
									  mostrarSexo();
									  mostrarCarrera();
									  mostrarTipoPersona();
										mostrarFuncion();
									  echo "<br><input type='submit' value='Registrar' class='button primary fit'>";

									?>
							</div>
							</section>
				<section id="content" class="main">
					<div class="center gtr-uniform"><!--Formulario-->
					<tread>
						<tr><td><h2>Voluntarios</h2></td></tr>
						<table><?php mostrarVoluntarios();?></table>
					</tread>
				</div>
				</section>
			</div>
			</div>
<!-- Footer -->
	<footer id="footer">
		<section>
			<h2>Instrucciones</h2>
			<p>- CI: cargar sin los puntos intermedios (separador de miles) <br>-	Los campos de Nombre, Apellido y Fecha de nacimiento son obligatorios</p>
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
/*Funciones*/
function mostrarSexo() {
	include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
	echo"<br>Sexo:<br><select name='sexo'>";
	$query="SELECT * FROM sexo ";
	$res=mysqli_query($conexion,$query) or die(mysql_error());
		while($rows = mysqli_fetch_array($res)):
		$codigo=$rows['sex_codigo'];
		$descripcion=$rows['sex_detalle'];
			echo"
			<option value='$codigo'>$descripcion</option>";
		endwhile;
		echo "</select><br>";
}

function mostrarCarrera() {
		include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
		echo"Carrera:<br><select name='carrera'>";
		$query="SELECT * FROM carrera ";
		$res=mysqli_query($conexion,$query) or die(mysql_error());
			while($rows = mysqli_fetch_array($res)):
			$codigo=$rows['car_codigo'];
			$descripcion=$rows['car_detalle'];
				echo"
				<option value='$codigo'>$descripcion</option>";
			endwhile;
			echo "</select><br>";
	}

	function mostrarTipoPersona() {
		include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
		echo"Tipo de persona:<br><select name='persona'>";
		$query="SELECT * FROM tip_persona WHERE tp_codigo=1 or tp_codigo=3";
		$res=mysqli_query($conexion,$query) or die(mysql_error());
			while($rows = mysqli_fetch_array($res)):
			$codigo=$rows['tp_codigo'];
			$descripcion=$rows['tp_detalle'];
				echo"
				<option value='$codigo'>$descripcion</option>";
			endwhile;
			echo "</select><br>";
	}

	function mostrarFuncion() {
		include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
		echo"Funcion a desempeñar:<br><select name='funcion'>";
		$query="SELECT * FROM funcion ";
		$res=mysqli_query($conexion,$query) or die(mysql_error());
			while($rows = mysqli_fetch_array($res)):
			$codigo=$rows['fun_codigo'];
			$descripcion=$rows['fun_detalle'];
				echo"
				<option value='$codigo'>$descripcion</option>";
			endwhile;
			echo "</select><br>";
	}

	function mostrarPersona($personaCodigo){
		include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
		$query2="SELECT * FROM persona WHERE per_codigo=$personaCodigo";
		$res2=mysqli_query($conexion,$query2) or die(mysql_error());
			while($rows2 = mysqli_fetch_array($res2)):
				$personaCi=$rows2['per_ci'];
				$personaNombre=$rows2['per_nombre'];
				$personaApellido=$rows2['per_apellido'];
				echo "<tr><td>$personaCi</td><td>$personaApellido</td><td>$personaNombre</td></tr>";

			endwhile;
	}

	function mostrarVoluntarios() {
		include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
		$query="SELECT * FROM participante,edicion,persona
		WHERE participante.edi_codigo=$_SESSION[edi_codigo] AND participante.edi_codigo=edicion.edi_codigo AND persona.per_codigo=participante.per_codigo
		AND (persona.tp_codigo=1 OR persona.tp_codigo=3) ORDER BY participante.par_codigo DESC";
		$res=mysqli_query($conexion,$query) or die(mysql_error());
		for ($i=0; $i < 5; $i++) {
				$rows = mysqli_fetch_array($res);
				$personaCodigo=$rows['per_codigo'];
				mostrarPersona($personaCodigo);
		}
	}

	function contarPresentes($actividad) {
	  include($_SERVER['DOCUMENT_ROOT'] . '/conexion.php');
	  $query="SELECT COUNT(asi_codigo) FROM `asistencia` WHERE act_codigo=$actividad";
	  $res=mysqli_query($conexion,$query) or die(mysql_error());
	    while($rows = mysqli_fetch_array($res)):
	        echo " $rows[0]";
	    endwhile;
	}
?>
