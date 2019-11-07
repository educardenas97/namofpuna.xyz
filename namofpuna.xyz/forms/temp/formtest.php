<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <?php
        include('conexion1.php');
        $consultas=new  Consultas();
    ?>
    <meta charset="utf-8">
    <title>Prueba</title>
    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
</head>
<body>
    <form action="action.php" method="POST">
        <input type='text' name='nombre' required placeholder='Nombre *'><br>
        <input type='text' name='apellido' required placeholder='Apellidos *'><br>
        <input type='text' name='ci' placeholder='CI'><br>
        <input type='date' name='nacimiento' placeholder='Fecha'><br>
        <input type='email' name='correo' placeholder='Correo'><br>
        <input type="submit" value="Enviar" id="input-submit">
        <input type="button" value="Enviar" id="input-submit" onclick='insertar()'>
        <select name="sexo">
            <?php
            $resultado= $consultas->consultarDatos(array('sex_codigo','sex_'),'sexo');
            echo "<option>prueba $resultado - </option>";
            $resultado=$resultado->fetch_array(MYSQLI_NUM);

            while($res=$resultado->fetch_array(MYSQLI_NUM)) {
                echo "<option value='".$res[0]."'>". $res[1]."</option>";
            }
            echo "</select>";
            echo "test";
            ?>
    </form>
</body>
<script>
function insertar(){
    var valores=[$("#nombre").val(),$("#apellido").val(),$("#ci").val(),'0000',$("#correo").val(),$("#nacimiento").val(),$("#sexo").val()];
    var campos=['per_nombre','per_apellido','per_ci','per_password','per_correo','per_fecha_nac','sex_codigo','tp_codigo','car_codigo'];

    $.post("guardarDatos", {campos: campos ,tabla:'persona',valores:valores}, function(resultado) {
        console.log((resultado==1)?"error":"correcto")
        }
     );
}

</script>
</html>







Fatal error:  Uncaught Error: Call to a member function fetch_row() on boolean in /home/u713209196/domains/namofpuna.hostingerapp.com/public_html/forms/formtest.php:27
Stack trace:
#0 {main}
  thrown in /home/u713209196/domains/namofpuna.hostingerapp.com/public_html/forms/formtest.php on line 27
