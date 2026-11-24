<!DOCTYPE html>
<html lang="es"> 
<head>     
	<meta charset="UTF-8">     
	<title>Registro de productos</title>
</head> 
<body>      

<h2>REGISTRO DE TRES PRODUCTOS</h2>      

<!-- Formulario de captura --> 
<form method="POST" action="">
	<?php     
// Ciclo para mostrar tres renglones de captura     
for ($i = 0; $i < 3; $i++) {         
	echo "Actividad:";         
	echo "<input type='text' name='actividades[]'>", " ";

	echo "Precio:";
    echo "<input type='number' name='precios[]'>", " ";

    echo "Horas jugadas:";         
    echo "<input type='number' name='horas[]'>", " ";         
    echo "<br><br>";     } 

  ?>      
   
<button type="submit" name="guardar" value="guardar">     
Guardar y calcular </button>  
<br><br>        

<?php     
// Verificar si se presionó el botón Guardar     
if (isset($_POST['guardar'])) {


	$actividad = $_POST['actividades'];         
	$precios = $_POST['precios'];         
	$horas = $_POST['horas']; 
    
    $subtotales = array();         
    $desc = array();         
    $totales = array();          
    
    // Ciclo para realizar los cálculos         
    for ($i = 0; $i < 3; $i++) {              
                 
    $subtotales[$i] = $precios[$i] * $horas[$i];  
    if ($horas[$i]>=3) {
        $desc[$i] = $subtotales[$i] * 0.15; }
    else {
        $desc[$i]=0;}
    $totales[$i] = $subtotales[$i] - $desc[$i];  } 

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Actividad</th>";
    echo "<th>Precio</th>";
    echo "<th>Horas</th>";
    echo "<th>Subtotal</th>";
    echo "<th>Descuento</th>";
    echo "<th>Total</th>";
    echo "</tr>";         

    for ($i = 0; $i < 3; $i++) {             
    	echo "<tr>";
        echo "<td>".$actividad[$i]."</td>";
        echo "<td>".$precios[$i]."</td>";
        echo "<td>".$horas[$i]."</td>";   
        echo "<td>".$subtotales[$i]."</td>";
        echo "<td>".$desc[$i]."</td>";
        echo "<td>".$totales[$i]."</td>";
        echo "</tr>";

      	}      
    
    }      
?>  
</body> 
</html> 
