<?php session_start();
$varsesion = $_SESSION['rol'];
?>

<html>

<?php
	$servername = "localhost";
    $username = "root";
  	$password = "1234";
  	$dbname = "tickets";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM ticket WHERE Tecnico NOT LIKE '' ORDER By id_ticket LIMIT 45";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM ticket WHERE id_ticket LIKE '%$q%' OR Fecha_inicio LIKE '%$q%' OR Estado LIKE '$q' OR Tecnico LIKE '$q' OR Cliente LIKE '$q' OR Descripcion LIKE '$q'";
    }

    $resultado = $conn->query($query);
if ($varsesion == admin){
    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>id_ticket</td>
    					<td>Fecha_inicio</td>
    					<td>Estado</td>
							<td>Tecnico</td>
							<td>Cliente</td>
							<td>Descripción</td>
							<td>Clasificacion</td>
    				</tr>
    			</thead>


    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['id_ticket']."</td>
    					<td>".$fila['Fecha_inicio']."</td>
    					<td>".$fila['Estado']."</td>
							<td>".$fila['Tecnico']."</td>
							<td>".$fila['Cliente']."</td>
							<td>".$fila['Descripcion']."</td>
							<td>".$fila['Clasificacion']."</td>
    				</tr>";

}

    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>
<?php

}else{
	echo "No tienes permisos para ver las incidencias";
}



 ?>

<br>
<br>


<a href="registro.php"> <button type="button">Administrar tickets</button> </a>
<p> Consultar, Nuevo, Actualizar o Eliminar </p>
<?php   if ($varsesion == admin){?>
<a href="exportar_tickets.php"> <button type="button">Generar exportación tickets.txt</button> </a>
<p> Para ver el archivo exportado accede a /tmp/ y lo verás como 'tickets.txt'
<?php } else{
	echo "No tienes acceso a la exportacion de tickets";
} ?>
</form>




</html>
