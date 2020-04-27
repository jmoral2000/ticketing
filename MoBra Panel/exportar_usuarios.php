
<html>
<head>
</head>
<body>

<p> Se ha generado el txt correctamente para volver haz clic en el siguiente botón </p>
<a href="admin.php"> <button type="button">Volver a la página anterior</button> </a>
</body>
</html>

<?php

$mysqli = new mysqli("localhost", "root", "1234", "tickets");

/* verificar conexion */
if (mysqli_connect_errno()) {
echo "Error enconexión: ". mysqli_connect_error();
exit();
}

$sql = "SELECT * FROM users INTO OUTFILE '/tmp/users.txt'";

if ($rs = $mysqli->query($sql)) {

/* fetch array asociativo*/
while ($fila = $rs->fetch_assoc()) {
echo '<h3>', $fila["id"] , ' dice:</h3><div>' , $fila["usuario"] , '</div>' ;
}
echo "Se ha generado el txt exitosamente , a continuacion volveras a la pagina anterior";
 header("location:admin.php");



/* liberamos la memoria asociada al resultado */
$rs->close();
}

/* cerramos la conexion */
$mysqli->close();

?>
