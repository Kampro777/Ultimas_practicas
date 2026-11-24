<!DOCTYPE html>
<html lang="es"> 
<head>     
	<meta charset="UTF-8">     
	<title>Registro de alumnos</title>
</head> 
<body>
     <h2>Registro de alumnos de 3°A Programación</h2>
     <form method="POST">
     	Alumno:
     	<input type="text" name="nombre">
          <br>

          Edad:
          <input type="number" name="edad">
          <br>

          Pasatiempo:
          <input type="text" name="pasatiempo">
          <br><br>

          <input type="´text" name="borrar">
     	<button type="submit" name="guardar">Guardar</button>
          <button type="submit" name="limpiar">Borrar</button>
          <button type="submit" name="eliminar">Eliminar alumnno</button>
          <br><br>
     </form>
     <?php
     if (isset($_POST["guardar"])) {
     	$nombre =$_POST["nombre"];
     	file_put_contents("alumnos.txt", $nombre. PHP_EOL, FILE_APPEND);
          $edad =$_POST["edad"];
          file_put_contents("edades.txt", $edad. PHP_EOL, FILE_APPEND);
          $pasatiempo =$_POST["pasatiempo"];
          file_put_contents("pasatiempos.txt", $pasatiempo. PHP_EOL, FILE_APPEND);
     	echo "<p>Informacion guardada correctamente.</p>";}

     if (isset($_POST["limpiar"])) {
          file_put_contents("alumnos.txt", " ");
          file_put_contents("edades.txt", " ");
          file_put_contents("pasatiempos.txt", " ");
          echo "Datos eliminados correctamente.";}

     if (isset($_POST["eliminar"])) {
    $nombre = $_POST["eliminar"];

    $alumnos = file("alumnos.txt", FILE_IGNORE_NEW_LINES);
    $edades = file("edades.txt", FILE_IGNORE_NEW_LINES);
    $pasatiempos = file("pasatiempos.txt", FILE_IGNORE_NEW_LINES);

    $encontrado = false;
    for ($i = 0; $i < count($alumnos); $i++) {
        if ($alumnos[$i] == $nombre) {
            unset($alumnos[$i]);
            unset($edades[$i]);
            unset($pasatiempos[$i]);
            $encontrado = true;
            break;
        }
    }

    $alumnos = array_values($alumnos);
    $edades = array_values($edades);
    $pasatiempos = array_values($pasatiempos);

    file_put_contents("alumnos.txt", implode(PHP_EOL, $alumnos));
    file_put_contents("edades.txt", implode(PHP_EOL, $edades));
    file_put_contents("pasatiempos.txt", implode(PHP_EOL, $pasatiempos));

    if ($encontrado) {
        echo "Alumno eliminado correctamente.";
    }
    else {
        echo "No se encontro el alumno.";
    }
}
    ?>
     <h3>Lista de alumnos de 3°A registrados</h3>
     <?php 
     echo "<h3>Nombre del alumno:</h3>";
     if (file_exists("alumnos.txt")) {
     	$contenido1=file_get_contents("alumnos.txt");
          echo nl2br($contenido1);
          echo "<br>";}
     else 
       {echo "No existen registros.";}
     
     echo "<h3>Edad:</h3>";
     if (file_exists("edades.txt")) {
          $contenido2=file_get_contents("edades.txt");
          echo nl2br($contenido2);
          echo "<br>";}
     else 
       {echo "No existen registros.";}
     
     echo "<h3>Pasatiempo:</h3>";
     if (file_exists("pasatiempos.txt")) {
          $contenido3=file_get_contents("pasatiempos.txt");
          echo nl2br($contenido3);
          echo "<br>";}
     else 
       {echo "No existen registros.";}


      ?>
</body>
</html>