<?php 
//Conexion//
require('conexion.php');
mysqli_set_charset($conexion,"utf8");
//Login//

session_start();
if(!isset($_SESSION["ci"]))
{
	header ("Location: login.html");
	exit();
}


$ci=$_SESSION['ci'];
$query="SELECT * FROM persona where per_ci='$ci' ";
$res=mysqli_query($conexion,$query) or die(mysql_error());

while( $rows = mysqli_fetch_array($res) )
{
	  $nombre=$rows['per_nombre'];
	  $apellido=$rows['per_apellido'];
	  $telefono=$rows['per_telefono'];
	  $pass=$rows['per_password'];
	  $email=$rows['per_correo'];
	  $fecha_nac=$rows['per_fecha_nac'];
	  $carrera=$rows['car_codigo'];
	  $sexo=$rows['sex_codigo'];

}

?>
<html>
	<head>
		<title>Elements - Stellar by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Para revelar passwprd-->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
		<!-- Fin para revelar passwprd-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1>Datos</h1>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">

								<!-- Form -->
									<section>
										<form method="post" action="queryUpdate.php">
											<div class="row gtr-uniform">
												<!-- Input hidden for send c.i. -->
												<input type="hidden" name="ci" id="ci" value="<?php echo $ci; ?> " >
												<div class="col-6 col-12-xsmall">
												    <h2>Nombre</h2>
													<input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" placeholder="Lorep" />
												</div>
												<div class="col-6 col-12-xsmall">
												    <h2>Apellido</h2>
													<input type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>" placeholder="Ipsum" />
												</div>	
												<div class="col-6 col-12-xsmall">
												    <h2>Numero de Telefono</h2>
													<input type="text" name="telefono" id="NumberTextInput" value="<?php echo $telefono; ?>" placeholder="0981475842" />
												</div>
												<div class="col-6 col-12-xsmall">
												    <h2>Contraseña</h2>
													<input type="password" name="pass" id="password" class="password" data-toggle="password" value="<?php echo $pass; ?>" placeholder="Ipsum" />
												</div>															
												<div class="col-12">
													<h2>Email</h2>
													<input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="ipsum@gmail.com" />
												</div>
												<div class="col-6 col-12-xsmall">
													<h2>Fecha de Nacimiento</h2>
													<input type="date" name="fecha_nac" id="fecha_nac" value="<?php echo $fecha_nac; ?>" placeholder="" />
												</div>	
												<div class="col-6 col-12-xsmall">
													<h2>Carrera</h2>
													<select name="carrera" id="carrera">
													<!--Traemos todas las carreras y ponemos selected al que tenia--> 
													<?php 
													$query="SELECT * FROM carrera ";
													$res=mysqli_query($conexion,$query) or die(mysql_error());
													while($rows = mysqli_fetch_array($res)){
														$car_codigo=$rows['car_codigo'];
														$car_detalle=$rows['car_detalle'];
														If($carrera==$car_codigo){
														echo"<option value='$car_codigo' selected> $car_detalle</option>";
														}else{
														echo"<option value='$car_codigo' > $car_detalle </option>";
														}
													}
													?>
													</select>
												</div>
												<div class="col-6 col-12-small">
													<input type="radio" id="demo-priority-normal" name="sexo" value=1 <?php if($sexo==1) echo "checked" ?> >
													<label for="demo-priority-normal">Masculino</label>
												</div>
												<div class="col-6 col-12-small">
													<input type="radio" id="demo-priority-high" name="sexo" value=2 <?php if($sexo==2) echo "checked" ?>  >
													<label for="demo-priority-high">Femenino</label>
												</div>
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" value="Enviar" class="primary" onclick="alerta()" /></li>
														<li><input type="button" value="Menu" onclick="window.location.href='main.php'" /></li>
													</ul>
												</div>
											</div>
										</form>
									</section>

				
					</div>
				<!-- Footer -->
					<footer id="footer">
						<section>
							<h2>Aliquam sed mauris</h2>
							<p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.</p>
							<ul class="actions">
								<li><a href="#" class="button">Learn More</a></li>
							</ul>
						</section>
						<section>
							<h2>Etiam feugiat</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
								<dt>Phone</dt>
								<dd>(000) 000-0000 x 0000</dd>
								<dt>Email</dt>
								<dd><a href="#">information@untitled.tld</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon brands fa-dribbble alt"><span class="label">Dribbble</span></a></li>
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
			<script>
				function alerta() {
				alert("Datos actualizados!");
				}
			</script>
			<script type="text/javascript">
				//script para revelar password
				$("#password").password('toggle');
			</script>
			<script>
			//funcion para input type text permita solo numeros
			function setInputFilter(textbox, inputFilter) {
				["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
				textbox.addEventListener(event, function() {
				if (inputFilter(this.value)) {
					this.oldValue = this.value;
					this.oldSelectionStart = this.selectionStart;
					this.oldSelectionEnd = this.selectionEnd;
				} else if (this.hasOwnProperty("oldValue")) {
					this.value = this.oldValue;
					this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
				}
				});
			});
			}
			// Install input filters.
			setInputFilter(document.getElementById("NumberTextInput"), function(value) {
			return /^\d*$/.test(value); });
			</script>

	</body>
</html>