<form action="action.php" method="POST">
    <input type='text' name='nombre' required placeholder='Nombre *'><br>
    <input type='text' name='apellido' required placeholder='Apellidos *'><br>
    <input type='text' name='ci' placeholder='CI'><br>
    <input type='date' name='nacimiento' placeholder='Fecha'><br>
    <input type='email' name='correo' placeholder='Correo'><br>
    <input type='  ' name='sexo' placeholder='Sexo'><br>
    <select name="sexo">
        <?php
           include('conexion.php');
           $resultado=mysqli_query('SELECT sex_codigo,sex_detalle FROM sexo');
           echo "<script>console.log(' test".$resultado."')</script>";
           echo "<option>test</option>";
           while($res=mysqli_fetch_row($resultado)){
               echo "<option value='".$res[0]."'>". $res[1]."</option>";
           }
        ?>
    </select>
  <input type="submit" value="Enviar" id="input-submit">
</form>